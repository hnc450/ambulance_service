// Ce script est spécifique à la page de profil
// Il peut être inclus directement dans profile.html ou ajouté à votre script.js existant

document.addEventListener('DOMContentLoaded', function() {
    // Tabs functionality
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Show corresponding content
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Toggle password visibility
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
    
    // Form submissions
    const settingsForms = document.querySelectorAll('.settings-form');
    
    settingsForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
            submitButton.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                submitButton.innerHTML = '<i class="fas fa-check"></i> Enregistré!';
                submitButton.style.backgroundColor = '#4CAF50';
                
                // Show notification
                showNotification('Modifications enregistrées avec succès!', 'success');
                
                // Reset button after delay
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                    submitButton.style.backgroundColor = '';
                }, 1500);
            }, 1000);
        });
    });
    
    // Danger zone buttons
    const dangerButtons = document.querySelectorAll('.btn-danger, .btn-outline.btn-danger');
    
    dangerButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const action = this.textContent.trim() === 'Désactiver' ? 'désactiver' : 'supprimer';
            
            if (confirm(`Êtes-vous sûr de vouloir ${action} votre compte? Cette action ${action === 'supprimer' ? 'est irréversible' : 'peut être annulée plus tard'}.`)) {
                // Simulate action
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
                this.disabled = true;
                
                setTimeout(() => {
                    showNotification(`Votre compte a été ${action === 'désactiver' ? 'désactivé' : 'supprimé'} avec succès.`, 'success');
                    
                    if (action === 'supprimer') {
                        // Redirect to homepage after account deletion
                        setTimeout(() => {
                            window.location.href = 'index.html';
                        }, 2000);
                    } else {
                        // Reset button
                        this.innerHTML = `<i class="fas fa-user-slash"></i> Désactiver`;
                        this.disabled = false;
                    }
                }, 1500);
            }
        });
    });
    
    // Helper function to show notifications
    function showNotification(message, type) {
        // Create notification container if it doesn't exist
        let notificationContainer = document.querySelector('.notification-container');
        
        if (!notificationContainer) {
            notificationContainer = document.createElement('div');
            notificationContainer.className = 'notification-container';
            document.body.appendChild(notificationContainer);
            
            // Style the notification container
            Object.assign(notificationContainer.style, {
                position: 'fixed',
                top: '20px',
                right: '20px',
                zIndex: '1000',
                maxWidth: '350px',
                width: 'calc(100% - 40px)'
            });
        }
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        
        // Create notification content
        const icon = document.createElement('div');
        icon.className = 'notification-icon';
        icon.innerHTML = type === 'success' ? 
            '<i class="fas fa-check-circle"></i>' : 
            '<i class="fas fa-exclamation-circle"></i>';
        
        const content = document.createElement('div');
        content.className = 'notification-content';
        content.textContent = message;
        
        const closeBtn = document.createElement('button');
        closeBtn.className = 'notification-close';
        closeBtn.innerHTML = '<i class="fas fa-times"></i>';
        closeBtn.addEventListener('click', () => {
            notification.style.transform = 'translateX(calc(100% + 20px))';
            notification.style.opacity = '0';
            setTimeout(() => {
                notificationContainer.removeChild(notification);
            }, 300);
        });
        
        notification.appendChild(icon);
        notification.appendChild(content);
        notification.appendChild(closeBtn);
        
        // Style the notification
        Object.assign(notification.style, {
            display: 'flex',
            alignItems: 'center',
            backgroundColor: type === 'success' ? '#4CAF50' : '#F44336',
            color: 'white',
            padding: '15px',
            borderRadius: '8px',
            boxShadow: '0 3px 10px rgba(0,0,0,0.15)',
            marginBottom: '15px',
            transform: 'translateX(calc(100% + 20px))',
            opacity: '0',
            transition: 'all 0.3s ease',
            overflow: 'hidden',
            border: type === 'success' ? '1px solid #43A047' : '1px solid #E53935',
            width: '100%'
        });
        
        // Style the notification icon
        Object.assign(icon.style, {
            fontSize: '1.5rem',
            marginRight: '15px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            minWidth: '24px'
        });
        
        // Style the notification content
        Object.assign(content.style, {
            flex: '1',
            fontSize: '0.95rem'
        });
        
        // Style the close button
        Object.assign(closeBtn.style, {
            background: 'none',
            border: 'none',
            color: 'white',
            fontSize: '1rem',
            cursor: 'pointer',
            opacity: '0.7',
            transition: 'opacity 0.2s ease',
            padding: '0',
            marginLeft: '10px'
        });
        
        closeBtn.addEventListener('mouseover', () => {
            closeBtn.style.opacity = '1';
        });
        
        closeBtn.addEventListener('mouseout', () => {
            closeBtn.style.opacity = '0.7';
        });
        
        // Add notification to container
        notificationContainer.appendChild(notification);
        
        // Trigger animation
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
            notification.style.opacity = '1';
        }, 10);
        
        // Remove notification after 5 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(calc(100% + 20px))';
            notification.style.opacity = '0';
            
            setTimeout(() => {
                if (notification.parentNode) {
                    notificationContainer.removeChild(notification);
                }
            }, 300);
        }, 5000);
    }
});