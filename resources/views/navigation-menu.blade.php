 <!--aside open-->
 <aside class="app-sidebar">
     <div class="app-sidebar__logo">
         <a class="header-brand" href="{{ route('dashboard') }}">
             <img src="{{ 'admin-assets/images/logo/lms_logo.png' }}" class="header-brand-img desktop-lgo" alt="LMS logo">
             <img src="{{ 'admin-assets/images/logo/lms_dark_logo.png' }}" class="header-brand-img dark-logo"
                 alt="LMS logo">
             <img src="{{ 'admin-assets/images/logo/lms_logo_mobile.png' }}" class="header-brand-img mobile-logo"
                 alt="LMS logo">
             <img src="{{ 'admin-assets/images/logo/lms_logo_mobile.png' }}" class="header-brand-img darkmobile-logo"
                 alt="LMS logo">
         </a>
     </div>

     <ul class="side-menu app-sidebar3">
         <li class="side-item side-item-category">Dashboard</li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" href="{{ route('dashboard') }}">
                 <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                     viewbox="0 0 24 24">
                     <path
                         d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Dashboard</span></a>
         </li>
         <li class="side-item side-item-category">Books & Faculty</li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('add-book') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24" style="transform: rotate(45deg)">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path
                         d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Add Book</span>
             </a>
         </li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('manage-books') }}">
                 <svg class="side-menu__icon " xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path
                         d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h2v5l-1-.75L9 9V4zm9 16H6V4h1v9l3-2.25L13 13V4h5v16z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Manage Books</span>
             </a>
         </li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('assign-book-request') }}">
                 <svg class="side-menu__icon " xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path
                         d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h2v5l-1-.75L9 9V4zm9 16H6V4h1v9l3-2.25L13 13V4h5v16z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Book requests</span>
             </a>
         </li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('issued-books') }}">
                 <svg class="side-menu__icon " xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path
                         d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h2v5l-1-.75L9 9V4zm9 16H6V4h1v9l3-2.25L13 13V4h5v16z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Issued Books</span>
             </a>
         </li>
         @if (auth()->user()->role === 'super-admin')
             <li class="slide">
                 <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('faculty') }}">
                     <svg class="side-menu__icon " xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                         <path d="M0 0h24v24H0V0z" fill="none"></path>
                         <path
                             d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h2v5l-1-.75L9 9V4zm9 16H6V4h1v9l3-2.25L13 13V4h5v16z">
                         </path>
                     </svg>
                     <span class="side-menu__label">Manage Faculties</span>
                 </a>
             </li>
         @endif
         {{-- <li class="side-item side-item-category">Profile & Account Information</li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('profile.show') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"></path>
                     <circle cx="12" cy="8" opacity=".3" r="2"></circle>
                     <path
                         d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Profile</span>
             </a>
         </li> --}}
         <li class="side-item side-item-category">User Management</li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('students') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path
                         d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Manage Students</span>
             </a>
         </li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('teachers') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                     <path d="M0 0h24v24H0V0z" fill="none"></path>
                     <path
                         d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.22 0 .41.1.55.25.12.13.2.31.2.5 0 .41-.34.75-.75.75s-.75-.34-.75-.75c0-.19.08-.37.2-.5.14-.15.33-.25.55-.25zM19 19H5V5h14v14zM12 6c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3zm0 4c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-6 6.47V18h12v-1.53c0-2.5-3.97-3.58-6-3.58s-6 1.07-6 3.58zM8.31 16c.69-.56 2.38-1.12 3.69-1.12s3.01.56 3.69 1.12H8.31z">
                     </path>
                 </svg>
                 <span class="side-menu__label">Manage Teachers</span>
             </a>
         </li>
         @if (auth()->user()->role === 'super-admin')
             <li class="slide">
                 <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="#0">
                     <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24"
                         viewBox="0 0 24 24" width="24">
                         <path d="M0 0h24v24H0V0z" fill="none"></path>
                         <path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"></path>
                         <circle cx="12" cy="8" opacity=".3" r="2"></circle>
                         <path
                             d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z">
                         </path>
                     </svg>
                     <span class="side-menu__label">Manage Admins</span>
                 </a>
             </li>
         @endif
     </ul>
 </aside>
 <!--aside closed-->
