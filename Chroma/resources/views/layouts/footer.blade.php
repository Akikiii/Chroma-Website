<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0" target="blank" class="nav-link">
                    {{ __('Chroma') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#"  class="nav-link">
                    {{ __('About Us') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ __('Rainbow') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ __('Blog') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; {{ now()->year }} {{ __('made with') }} <i class="tim-icons icon-heart-2"></i> {{ __('by') }}
            <a href="https://creative-tim.com" target="_blank">{{ __('Creative Tim') }}</a> &amp;
            <a href="https://updivision.com" target="_blank">{{ __('Updivision') }}</a> {{ __('for a better web') }}.
        </div>
    </div>
</footer>
