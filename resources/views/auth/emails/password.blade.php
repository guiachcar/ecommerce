Clique no link para digitar uma nova senha: <a href="{{ $link = url('reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
