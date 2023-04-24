<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('/import/profileImg/{{ $user->profile }}');">
        </div>
        <p>{{ strlen($user->nom.' '.$user->prenom) > 5 ? substr($user->nom.' '.$user->prenom,0,6).'..' : $user->nom.' '.$user->prenom }}</p>
    @endif
</div>
