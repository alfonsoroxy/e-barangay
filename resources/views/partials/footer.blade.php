<footer class="main-footer">
    <div class="container">
        {{-- add border-top (optional) --}}
        <div class="row justify-content-between align-items-center py-3 my-4"> 
            <p class="col-md-7 text-muted">
                Copyright &copy; 
                <script>document.write(new Date().getFullYear());</script> 
                <a href="https://www.facebook.com/profile.php?id=100064184495141" target="_blank">
                    Barangay 264
                </a>
            </p>
    
            {{-- <div class="col-md-4">
                <a href="{{ route('home-component') }}" class="brand-link">
                    <img src="{{ asset('assets/dist/img/barangayLogo.png') }}" alt="Barangay 264 Logo" 
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>
            </div> --}}
      
            <ul class="nav col-md-5">
                <li class="nav-item">
                    <a href="{{ route('faq-component') }}" class="nav-link px-2">
                        Frequently Ask Questions
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</footer>