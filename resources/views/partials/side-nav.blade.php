<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ (Route::is('home')) ? 'bg-primary text-white rounded' : ''}} " href="{{route('home')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Explore</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Route::is('feed')) ? 'bg-primary text-white rounded' : ''}}" href="{{route('feed')}}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Terms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Support</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Settings</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{route('switch.lang', 'en')}}">en &#x1f1fa;&#x1f1f8;</a>
        <a class="btn btn-link btn-sm" href="{{route('switch.lang', 'ur')}}">ur &#x1f1f5;&#x1f1f0;</a>
    </div>
</div>
