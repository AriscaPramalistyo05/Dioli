# Requirements Document

## Introduction

Dokumen ini mendefinisikan kebutuhan untuk redesign halaman dashboard admin aplikasi restoran Dioli. Dashboard baru akan menggunakan Tailwind CSS dengan desain modern terinspirasi dari TailAdmin, menampilkan statistik bisnis, grafik, dan informasi penting untuk pengelolaan restoran.

## Glossary

- **Dashboard**: Halaman utama admin yang menampilkan ringkasan data dan statistik bisnis
- **Admin**: Pengguna dengan usertype '1' yang memiliki akses ke panel administrasi
- **Stat_Card**: Komponen kartu yang menampilkan metrik tunggal dengan ikon dan nilai
- **Chart_Component**: Komponen grafik untuk visualisasi data
- **Recent_Orders_Widget**: Widget yang menampilkan daftar pesanan terbaru
- **Menu_Summary_Widget**: Widget yang menampilkan ringkasan menu per kategori

## Requirements

### Requirement 1: Dashboard Layout

**User Story:** As an admin, I want a modern and responsive dashboard layout, so that I can easily navigate and view business information on any device.

#### Acceptance Criteria

1. THE Dashboard SHALL display a responsive grid layout using Tailwind CSS
2. WHEN the screen width is less than 768px, THE Dashboard SHALL stack components vertically
3. WHEN the screen width is 768px or greater, THE Dashboard SHALL display components in a multi-column grid
4. THE Dashboard SHALL include a header section with welcome message and current date

### Requirement 2: Statistics Cards

**User Story:** As an admin, I want to see key business metrics at a glance, so that I can quickly understand the current state of the business.

#### Acceptance Criteria

1. THE Dashboard SHALL display a Stat_Card showing total number of users
2. THE Dashboard SHALL display a Stat_Card showing total number of menu items
3. THE Dashboard SHALL display a Stat_Card showing total number of orders (pesans)
4. THE Dashboard SHALL display a Stat_Card showing total number of blog posts
5. WHEN data is loaded, THE Stat_Card SHALL display the actual count from the database
6. THE Stat_Card SHALL include an appropriate icon for each metric

### Requirement 3: Recent Orders Widget

**User Story:** As an admin, I want to see recent orders on the dashboard, so that I can quickly review the latest customer reservations.

#### Acceptance Criteria

1. THE Recent_Orders_Widget SHALL display the 5 most recent orders
2. WHEN displaying an order, THE Recent_Orders_Widget SHALL show customer name, phone, date, time, and note
3. WHEN no orders exist, THE Recent_Orders_Widget SHALL display an empty state message
4. THE Recent_Orders_Widget SHALL include a link to view all orders

### Requirement 4: Menu Category Summary

**User Story:** As an admin, I want to see a summary of menu items by category, so that I can understand the distribution of my menu offerings.

#### Acceptance Criteria

1. THE Menu_Summary_Widget SHALL display count of menu items per category (Murah, Ekonomi, Premium, Snack, Minuman)
2. THE Menu_Summary_Widget SHALL use visual indicators (progress bars or badges) to show distribution
3. WHEN a category has zero items, THE Menu_Summary_Widget SHALL still display the category with zero count

### Requirement 5: Quick Actions

**User Story:** As an admin, I want quick access buttons to common actions, so that I can efficiently manage the restaurant.

#### Acceptance Criteria

1. THE Dashboard SHALL display quick action buttons for: Add Menu, Add Blog, View Orders, Manage Users
2. WHEN an admin clicks a quick action button, THE Dashboard SHALL navigate to the corresponding management page

### Requirement 6: Visual Design

**User Story:** As an admin, I want a visually appealing dashboard with modern design, so that the admin experience is pleasant and professional.

#### Acceptance Criteria

1. THE Dashboard SHALL use Tailwind CSS for styling
2. THE Dashboard SHALL use a color scheme consistent with the Dioli brand (info/cyan theme from existing sidebar)
3. THE Dashboard SHALL include hover effects on interactive elements
4. THE Dashboard SHALL use appropriate spacing and typography for readability
5. THE Dashboard SHALL include subtle shadows and rounded corners on cards

### Requirement 7: Modern Form Design (Create & Edit)

**User Story:** As an admin, I want attractive and user-friendly forms for creating and editing data, so that data entry is pleasant and efficient.

#### Acceptance Criteria

1. THE Form_Component SHALL use Tailwind CSS styling with modern input fields
2. THE Form_Component SHALL include floating labels or clear placeholder text
3. THE Form_Component SHALL display validation errors with red border and error message below the field
4. WHEN a form field is focused, THE Form_Component SHALL show a visual focus indicator (ring/border color change)
5. THE Form_Component SHALL include appropriate icons inside or beside input fields
6. THE Form_Component SHALL use consistent spacing and padding across all forms
7. THE Submit_Button SHALL have hover and active states with smooth transitions
8. THE Form_Component SHALL be responsive and work well on mobile devices

### Requirement 8: Delete Confirmation Modal

**User Story:** As an admin, I want an attractive confirmation dialog before deleting data, so that I can prevent accidental deletions.

#### Acceptance Criteria

1. WHEN an admin clicks delete, THE System SHALL display a modal confirmation dialog
2. THE Delete_Modal SHALL include a warning icon and clear message about what will be deleted
3. THE Delete_Modal SHALL have Cancel and Confirm buttons with distinct colors (gray for cancel, red for delete)
4. THE Delete_Modal SHALL have a backdrop overlay that dims the background
5. THE Delete_Modal SHALL include smooth fade-in animation when appearing
6. WHEN admin clicks outside the modal or Cancel, THE Delete_Modal SHALL close without deleting
7. WHEN admin clicks Confirm, THE Delete_Modal SHALL proceed with deletion and show success feedback

### Requirement 9: Success/Error Notifications

**User Story:** As an admin, I want clear feedback after performing actions, so that I know if my action was successful or failed.

#### Acceptance Criteria

1. WHEN a create/edit/delete action succeeds, THE System SHALL display a success toast notification
2. WHEN an action fails, THE System SHALL display an error toast notification
3. THE Toast_Notification SHALL appear at the top-right corner of the screen
4. THE Toast_Notification SHALL auto-dismiss after 3 seconds
5. THE Toast_Notification SHALL include appropriate icon (checkmark for success, X for error)
6. THE Toast_Notification SHALL have smooth slide-in animation
