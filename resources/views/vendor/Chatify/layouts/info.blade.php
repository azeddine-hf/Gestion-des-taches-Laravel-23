{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="text-capitalize info-name">{{ config('chatify.name') }}</p>
<div class="col-12">
<span id="isAdmin" class="messenger-infoView-btns"></span>
</div>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Supprimer la Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Photos partagées</span></p>
    <div class="shared-photos-list"></div>
</div>
