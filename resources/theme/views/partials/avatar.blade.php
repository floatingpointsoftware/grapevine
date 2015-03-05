<a href="{!! route('user.show', [$user]) !!}">
    {!! HTML::image($avatar, $user->username, ['class' => 'img-circle avatar', 'height' => $size, 'width' => $size]) !!}
</a>