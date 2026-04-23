<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * GitHub autentifikatsiya sahifasiga yo'naltirish.
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * GitHub dan qaytgan callback.
     * Foydalanuvchini topish yoki yaratish va tizimga kiritish.
     */
    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'GitHub orqali kirish amalga oshmadi. Qaytadan urinib ko\'ring.');
        }

        // Avval github_id bo'yicha qidiramiz
        $user = User::where('github_id', $githubUser->getId())->first();

        if ($user) {
            // Foydalanuvchi allaqachon github orqali ro'yxatdan o'tgan — tokenni yangilaymiz
            $user->update([
                'github_token' => $githubUser->token,
                'github_nickname' => $githubUser->getNickname(),
            ]);
        } else {
            // Email bo'yicha tekshiramiz (balki oddiy ro'yxatdan o'tgan)
            $user = User::where('email', $githubUser->getEmail())->first();

            if ($user) {
                // Mavjud foydalanuvchiga GitHub ma'lumotlarini bog'laymiz
                $user->update([
                    'github_id' => $githubUser->getId(),
                    'github_token' => $githubUser->token,
                    'github_nickname' => $githubUser->getNickname(),
                ]);
            } else {
                // Yangi foydalanuvchi yaratamiz
                $nameParts = explode(' ', $githubUser->getName() ?? $githubUser->getNickname(), 2);
                
                $user = User::create([
                    'first_name' => $nameParts[0] ?? $githubUser->getNickname(),
                    'last_name' => $nameParts[1] ?? '',
                    'email' => $githubUser->getEmail(),
                    'github_id' => $githubUser->getId(),
                    'github_token' => $githubUser->token,
                    'github_nickname' => $githubUser->getNickname(),
                    'password' => Hash::make(Str::random(24)),
                ]);
            }
        }

        Auth::login($user, true);

        return redirect()->route('cabinet')
            ->with('success', 'GitHub orqali muvaffaqiyatli kirdingiz!');
    }
}
