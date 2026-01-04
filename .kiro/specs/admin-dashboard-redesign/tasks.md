# Implementation Plan: Admin Dashboard Redesign

## Overview

Implementasi redesign admin dashboard aplikasi Dioli menggunakan Tailwind CSS dengan komponen modern untuk dashboard, forms, modals, dan notifications.

## Tasks

- [x] 1. Setup Tailwind CSS dan Alpine.js
  - [x] 1.1 Buat master layout baru dengan Tailwind CSS CDN dan Alpine.js
    - Buat file `resources/views/admin/layouts/tailwind-master.blade.php`
    - Include Tailwind CSS via CDN
    - Include Alpine.js via CDN
    - Setup basic HTML structure dengan flex layout
    - _Requirements: 6.1, 6.2_

  - [x] 1.2 Buat sidebar component dengan Tailwind styling
    - Buat file `resources/views/admin/components/sidebar-tailwind.blade.php`
    - Styling sidebar dengan warna cyan theme
    - Navigation links untuk Dashboard, Users, Chef, Menu, Blog, Pesan
    - Responsive collapse untuk mobile
    - _Requirements: 6.3, 6.4_

  - [x] 1.3 Buat topnav component dengan Tailwind styling
    - Buat file `resources/views/admin/components/topnav-tailwind.blade.php`
    - User dropdown dengan profile, settings, logout
    - Search bar (optional)
    - _Requirements: 6.4, 6.5_

- [-] 2. Implementasi Dashboard Page
  - [x] 2.1 Buat DashboardController dengan data statistics
    - Update atau buat `app/Http/Controllers/Admin/DashboardController.php`
    - Query total users, menus, orders, blogs
    - Query recent 5 orders dengan relasi user
    - Query menu count per kategori
    - _Requirements: 2.1, 2.2, 2.3, 2.4, 3.1, 4.1_

  - [ ]* 2.2 Write property test untuk dashboard statistics
    - **Property 1: Dashboard Statistics Accuracy**
    - **Validates: Requirements 2.1, 2.2, 2.3, 2.4, 2.5**

  - [x] 2.3 Buat stat-card blade component
    - Buat file `resources/views/admin/components/stat-card.blade.php`
    - Props: title, value, icon, color
    - Styling dengan shadow, rounded corners, hover effect
    - _Requirements: 2.5, 2.6, 6.5_

  - [x] 2.4 Buat dashboard view dengan stat cards
    - Buat file `resources/views/admin/dashboard.blade.php`
    - Grid layout 4 kolom untuk stat cards
    - Welcome header dengan tanggal
    - _Requirements: 1.1, 1.4, 2.1, 2.2, 2.3, 2.4_

  - [x] 2.5 Implementasi Recent Orders widget
    - Tambahkan widget di dashboard.blade.php
    - Tampilkan 5 pesanan terbaru dengan detail
    - Empty state jika tidak ada pesanan
    - Link ke halaman semua pesanan
    - _Requirements: 3.1, 3.2, 3.3, 3.4_

  - [ ]* 2.6 Write property test untuk recent orders limit
    - **Property 2: Recent Orders Limit**
    - **Validates: Requirements 3.1**

  - [x] 2.7 Implementasi Menu Category Summary widget
    - Tambahkan widget di dashboard.blade.php
    - Progress bars atau badges per kategori
    - Handle kategori dengan 0 items
    - _Requirements: 4.1, 4.2, 4.3_

  - [ ]* 2.8 Write property test untuk menu category grouping
    - **Property 3: Menu Category Grouping**
    - **Validates: Requirements 4.1**

  - [x] 2.9 Implementasi Quick Action buttons
    - Tambahkan section quick actions di dashboard
    - Buttons: Add Menu, Add Blog, View Orders, Manage Users
    - Link ke halaman yang sesuai
    - _Requirements: 5.1, 5.2_

- [ ] 3. Checkpoint - Dashboard Complete
  - Ensure dashboard renders correctly
  - Verify all statistics are accurate
  - Test responsive layout

- [x] 4. Implementasi Reusable Form Components
  - [x] 4.1 Buat form-input blade component
    - Buat file `resources/views/admin/components/form-input.blade.php`
    - Props: name, label, type, value, icon, error, placeholder
    - Focus ring styling dengan cyan color
    - Error state dengan red border dan message
    - _Requirements: 7.1, 7.2, 7.3, 7.4, 7.5_

  - [x] 4.2 Buat form-textarea blade component
    - Buat file `resources/views/admin/components/form-textarea.blade.php`
    - Similar styling dengan form-input
    - _Requirements: 7.1, 7.6_

  - [x] 4.3 Buat form-select blade component
    - Buat file `resources/views/admin/components/form-select.blade.php`
    - Dropdown styling dengan Tailwind
    - _Requirements: 7.1, 7.6_

  - [x] 4.4 Buat button components
    - Primary button (cyan), Secondary button (gray), Danger button (red)
    - Hover dan active states
    - _Requirements: 7.7_

- [ ] 5. Update Form Views dengan Styling Baru
  - [x] 5.1 Update Menu create/edit forms
    - Gunakan form components baru
    - Responsive layout
    - _Requirements: 7.1, 7.8_

  - [ ] 5.2 Update Blog create/edit forms
    - Gunakan form components baru
    - _Requirements: 7.1, 7.8_

  - [ ] 5.3 Update User create/edit forms
    - Gunakan form components baru
    - _Requirements: 7.1, 7.8_

  - [ ] 5.4 Update Koki create/edit forms
    - Gunakan form components baru
    - _Requirements: 7.1, 7.8_

  - [ ] 5.5 Update Pesan forms (jika ada)
    - Gunakan form components baru
    - _Requirements: 7.1, 7.8_

- [ ] 6. Implementasi Delete Modal
  - [x] 6.1 Buat modal-delete blade component
    - Buat file `resources/views/admin/components/modal-delete.blade.php`
    - Alpine.js untuk show/hide
    - Warning icon dan message
    - Cancel dan Confirm buttons
    - Backdrop overlay
    - Fade-in animation
    - _Requirements: 8.1, 8.2, 8.3, 8.4, 8.5, 8.6_

  - [ ] 6.2 Integrasikan delete modal ke semua index pages
    - Update menu index untuk gunakan modal
    - Update blog index untuk gunakan modal
    - Update user index untuk gunakan modal
    - Update koki index untuk gunakan modal
    - Update pesan index untuk gunakan modal
    - _Requirements: 8.1, 8.7_

  - [ ]* 6.3 Write property test untuk delete operation
    - **Property 4: Delete Operation Integrity**
    - **Validates: Requirements 8.7**

- [ ] 7. Implementasi Toast Notifications
  - [x] 7.1 Buat toast blade component
    - Buat file `resources/views/admin/components/toast.blade.php`
    - Alpine.js untuk manage toast stack
    - Success (green) dan Error (red) variants
    - Auto-dismiss setelah 3 detik
    - Slide-in animation
    - Position: top-right
    - _Requirements: 9.1, 9.2, 9.3, 9.4, 9.5, 9.6_

  - [ ] 7.2 Integrasikan toast dengan session flash messages
    - Trigger toast dari Laravel session flash
    - Support success dan error messages
    - _Requirements: 9.1, 9.2_

- [ ] 8. Update Index/List Pages dengan Styling Baru
  - [x] 8.1 Update Menu index page
    - Table dengan Tailwind styling
    - Action buttons (Edit, Delete)
    - _Requirements: 6.1, 6.5_

  - [ ] 8.2 Update Blog index page
    - Table dengan Tailwind styling
    - _Requirements: 6.1, 6.5_

  - [ ] 8.3 Update User index page
    - Table dengan Tailwind styling
    - _Requirements: 6.1, 6.5_

  - [ ] 8.4 Update Koki index page
    - Table dengan Tailwind styling
    - _Requirements: 6.1, 6.5_

  - [ ] 8.5 Update Pesan index page
    - Table dengan Tailwind styling
    - _Requirements: 6.1, 6.5_

- [ ] 9. Final Checkpoint
  - Ensure all pages use new Tailwind layout
  - Verify all CRUD operations work with new styling
  - Test delete modals on all entities
  - Test toast notifications appear correctly
  - Test responsive layout on mobile

## Notes

- Tasks marked with `*` are optional property-based tests
- Each task references specific requirements for traceability
- Checkpoints ensure incremental validation
- Property tests validate universal correctness properties
- Unit tests validate specific examples and edge cases
