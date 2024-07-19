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

                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 512 512"
                     width="24">
                     <path
                         d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152l0 264-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427L0 224c0-17.7 14.3-32 32-32l30.3 0c63.6 0 125.6 19.6 177.7 56zm32 264l0-264c52.1-36.4 114.1-56 177.7-56l30.3 0c17.7 0 32 14.3 32 32l0 203c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z" />
                 </svg>
                 <span class="side-menu__label">Book requests</span>
             </a>
         </li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('issued-books') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="24"
                     width="24">
                     <path
                         d="M96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM208 288l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                 </svg>
                 <span class="side-menu__label">Issued Books</span>
             </a>
         </li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('issued-history') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="24"
                     width="24">
                     <path
                         d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" />
                 </svg>
                 <span class="side-menu__label">Issued History</span>
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
         <li class="side-item side-item-category">Fine Collection & History</li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('fines') }}">
                 <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="24"
                     width="24">
                     <path
                         d="M64 0C46.3 0 32 14.3 32 32l0 64c0 17.7 14.3 32 32 32l80 0 0 32-57 0c-31.6 0-58.5 23.1-63.3 54.4L1.1 364.1C.4 368.8 0 373.6 0 378.4L0 448c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-69.6c0-4.8-.4-9.6-1.1-14.4L488.2 214.4C483.5 183.1 456.6 160 425 160l-217 0 0-32 80 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32L64 0zM96 48l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L96 80c-8.8 0-16-7.2-16-16s7.2-16 16-16zM64 432c0-8.8 7.2-16 16-16l352 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16zm48-168a24 24 0 1 1 0-48 24 24 0 1 1 0 48zm120-24a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM160 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM328 240a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM256 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM424 240a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM352 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48z" />
                 </svg>
                 <span class="side-menu__label">Fine Management</span>
             </a>
         </li>
         <li class="side-item side-item-category">User Management</li>
         <li class="slide">
             <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('new_user') }}">
                 <svg class="side-menu__icon " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                     height="24" width="24">
                     <path
                         d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                 </svg>
                 <span class="side-menu__label">Add User</span>
             </a>
         </li>
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
                 <a wire:navigate class="side-menu__item" data-bs-toggle="slide" href="{{ route('admins') }}">
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
