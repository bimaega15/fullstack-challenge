<p>Hello, {{ $user->name }}</p>
<p>Please click the link below to verify your email address:</p>
<p><a href="{{ route('verification.verify', ['token' => $user->email_verification_token]) }}">Verify Email</a></p>
