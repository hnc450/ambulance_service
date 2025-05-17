// DOM Elements
const sidebar = document.getElementById('sidebar');
const toggleSidebarBtn = document.getElementById('toggleSidebar');
const closeSidebarBtn = document.getElementById('closeSidebar');
const logoutBtn = document.getElementById('logout-btn');

// Toggle sidebar on mobile
toggleSidebarBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// Close sidebar on mobile
closeSidebarBtn.addEventListener('click', () => {
    sidebar.classList.remove('active');
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', (e) => {
    if (window.innerWidth <= 768) {
        if (!sidebar.contains(e.target) && e.target !== toggleSidebarBtn) {
            sidebar.classList.remove('active');
        }
    }
});

// Handle window resize
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
    }
});

// Notification handling
const notificationIcon = document.querySelector('.notifications');
if (notificationIcon) {
    notificationIcon.addEventListener('click', () => {
        alert('You have 3 new notifications');
    });
}

// User profile dropdown (can be expanded)
const userProfile = document.querySelector('.user-profile');
if (userProfile) {
    userProfile.addEventListener('click', () => {
        // This could be expanded to show a dropdown menu
        console.log('User profile clicked');
    });
}

// Book now button functionality
const bookButtons = document.querySelectorAll('.btn-primary');
bookButtons.forEach(button => {
    if (button.textContent.trim() === 'Book Now') {
        button.addEventListener('click', function() {
            const ambulanceType = this.closest('.ambulance-info').querySelector('h3').textContent;
            alert(`Booking form for ${ambulanceType} would open here`);
        });
    }
});

// Calendar day click event (if present on the page)
const calendarDays = document.querySelectorAll('.calendar-day');
calendarDays.forEach(day => {
    if (!day.classList.contains('disabled')) {
        day.addEventListener('click', () => {
            const date = day.textContent.trim();
            if (day.classList.contains('has-event')) {
                alert(`You have bookings on November ${date}, 2023`);
            } else {
                alert(`No bookings on November ${date}, 2023`);
            }
        });
    }
});

// Logout functionality
if (logoutBtn) {
    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Are you sure you want to logout?')) {
            alert('You have been logged out.');
            // In a real application, this would redirect to the login page
            window.location.href = '#';
        }
    });
}

// Action buttons functionality
const actionButtons = document.querySelectorAll('.btn-action');
actionButtons.forEach(button => {
    button.addEventListener('click', function() {
        const icon = this.querySelector('i').className;
        const row = this.closest('tr');
        
        if (icon.includes('eye')) {
            // View details
            const id = row.querySelector('td:first-child').textContent;
            alert(`View details for ${id}`);
        } else if (icon.includes('pencil')) {
            // Edit
            const id = row.querySelector('td:first-child').textContent;
            alert(`Edit ${id}`);
        } else if (icon.includes('trash') || icon.includes('x-lg')) {
            // Delete or cancel
            const id = row.querySelector('td:first-child').textContent;
            if (confirm(`Are you sure you want to delete ${id}?`)) {
                alert(`${id} has been deleted.`);
                // In a real application, this would remove the item from the database
            }
        } else if (icon.includes('check-lg')) {
            // Complete
            const id = row.querySelector('td:first-child').textContent;
            alert(`Marked ${id} as completed.`);
        } else if (icon.includes('download')) {
            // Download
            alert('Downloading invoice...');
        }
    });
});

// Form submission handling
const forms = document.querySelectorAll('form');
forms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Form submitted successfully!');
    });
});

// Settings tabs functionality (if present on the page)
const settingsTabs = document.querySelectorAll('.settings-tab');
const settingsContents = document.querySelectorAll('.settings-content');

if (settingsTabs.length > 0 && settingsContents.length > 0) {
    settingsTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Get the target tab content
            const targetTab = tab.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            settingsTabs.forEach(t => t.classList.remove('active'));
            settingsContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked tab and target content
            tab.classList.add('active');
            document.getElementById(`${targetTab}-settings`).classList.add('active');
        });
    });
}

// Report type selection (if present on the page)
const reportTypes = document.querySelectorAll('.report-type');
if (reportTypes.length > 0) {
    reportTypes.forEach(type => {
        type.addEventListener('click', () => {
            reportTypes.forEach(t => t.classList.remove('active'));
            type.classList.add('active');
        });
    });
}

// Simulate loading data with a slight delay
function simulateLoading() {
    const sections = document.querySelectorAll('.section');
    
    sections.forEach(section => {
        section.style.opacity = '0.5';
        section.style.transition = 'opacity 0.5s';
        
        setTimeout(() => {
            section.style.opacity = '1';
        }, 500);
    });
}

// Initialize the dashboard
document.addEventListener('DOMContentLoaded', () => {
    // Simulate loading data
    simulateLoading();
});