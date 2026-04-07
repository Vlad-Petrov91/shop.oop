<div class="header__top">
    <div class="header__top__menu container">
        <ul class="header__menu_search">
            <li><a href="/"><img src="/img/logo.png" alt="Logo"></a></li>
            <li class="menu_el_padding">
                <img src="/img/search.svg" alt="Search" aria-hidden="true">
            </li>
        </ul>

        <ul class="header__menu_elements">
            <li>
                <button id="menuButton"
                    class="menu_logo btn-reset"
                    aria-label="Open menu"
                    aria-expanded="false">
                    <img src="/img/menu.svg" alt="" aria-hidden="true">
                </button>
            </li>
            <li class="menu_el_padding">
                <a class="header__menu_article" href="/products/catalog" aria-label="Account">
                    <img class="acc_logo" src="/img/account.svg" alt="" aria-hidden="true">
                </a>
            </li>
            <li>
                <a class="header__menu_article" href="/cart" aria-label="Shopping cart">
                    <img class="cart_logo" src="/img/cart.svg" alt="" aria-hidden="true">
                    <span class="header__menu_elements_cart" id="countOfInCart">
                        <?= htmlspecialchars($countOfInCart ?? 0) ?>
                    </span>
                </a>
            </li>
        </ul>
    </div>

    <?php if ($page === '/') : ?>
        <div class="header__bot">
            <div class="header__bot__content container">
                <div class="header__bot_img" aria-label="Fashion banner"></div>
                <div class="bot__content__heading">
                    <div class="marker" aria-hidden="true"></div>
                    <h1>
                        <span class="header__bolt">THE BRAND</span><br>
                        OF LUXURIOUS <span class="header__excretion">FASHION</span>
                    </h1>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- ============================================
     МОДАЛЬНОЕ ОКНО АВТОРИЗАЦИИ
   ============================================ -->

    <div id="authModal" class="auth-modal" role="dialog" aria-label="Authentication" aria-hidden="true">
        <div class="auth-modal__overlay"></div>
        <div class="auth-modal__container">
            <div class="auth-modal__header">
                <h2>Welcome Back!</h2>
                <button id="closeAuthModal" class="auth-modal__close btn-reset" aria-label="Close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="auth-modal__tabs">
                <button class="auth-tab active" data-tab="login">Sign In</button>
                <button class="auth-tab" data-tab="register">Create Account</button>
            </div>

            <div class="auth-modal__body">
                <!-- Форма входа -->
                <form id="loginForm" class="auth-form active">
                    <div class="form-group">
                        <label for="loginEmail">Email Address</label>
                        <input type="email" id="loginEmail" name="email" placeholder="Enter your email">
                        <div class="error-message" id="loginEmailError">Please enter a valid email</div>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="password" placeholder="Enter your password">
                        <div class="error-message" id="loginPasswordError">Password is required</div>
                    </div>
                    <button type="submit" class="auth-submit-btn">Sign In</button>
                    <div class="auth-links">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>

                <!-- Форма регистрации -->
                <form id="registerForm" class="auth-form">
                    <div class="form-group">
                        <label for="registerName">Full Name</label>
                        <input type="text" id="registerName" name="name" placeholder="Enter your full name">
                        <div class="error-message" id="registerNameError">Name is required</div>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email Address</label>
                        <input type="email" id="registerEmail" name="email" placeholder="Enter your email">
                        <div class="error-message" id="registerEmailError">Please enter a valid email</div>
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Password</label>
                        <input type="password" id="registerPassword" name="password" placeholder="Create a password">
                        <div class="error-message" id="registerPasswordError">Password must be at least 6 characters</div>
                    </div>
                    <div class="form-group">
                        <label for="registerConfirmPassword">Confirm Password</label>
                        <input type="password" id="registerConfirmPassword" name="confirm_password" placeholder="Confirm your password">
                        <div class="error-message" id="registerConfirmError">Passwords do not match</div>
                    </div>
                    <button type="submit" class="auth-submit-btn">Create Account</button>
                </form>

                <!-- Разделитель -->
                <div class="auth-divider">
                    <span>or continue with</span>
                </div>

                <!-- Социальные кнопки -->
                <div class="social-buttons">
                    <button class="social-btn" data-social="google" aria-label="Sign in with Google">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                        </svg>
                    </button>
                    <button class="social-btn" data-social="facebook" aria-label="Sign in with Facebook">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </button>
                    <button class="social-btn" data-social="apple" aria-label="Sign in with Apple">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#000">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17.36 3 13.5 5.08 10.87c1.04-1.32 2.69-2.16 4.27-2.18 1.33-.02 2.59.9 3.41.9.81 0 2.34-.99 3.95-.84.67.03 2.56.27 3.77 2.04-.1.07-2.25 1.31-2.22 3.92.03 2.96 2.6 3.95 2.63 3.96-.02.06-.41 1.41-1.36 2.79zM15.27 4.21c.66-.8 1.1-1.91.98-3-.99.04-2.19.66-2.9 1.49-.64.74-1.2 1.83-1.05 2.91 1.11.09 2.24-.55 2.97-1.4z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>





    <!-- Popup меню (вынесено за пределы ul) -->
    <div id="menuPanel"
        class="header__menu_popup"
        role="dialog"
        aria-label="Main navigation menu"
        aria-hidden="true">
        <div class="header__menu_popup_button">
            <button id="closeMenuButton" class="btn-reset" aria-label="Close menu">
                <img src="/img/close.svg" alt="" aria-hidden="true">
            </button>
        </div>
        <ul class="header__menu_popup_list" role="navigation">
            <li><a href="/product/category/?id=1">MEN</a></li>
            <li><a href="/product/category/?id=2">WOMEN</a></li>
            <li><a href="/product/category/?id=3">KIDS</a></li>
            <li><a href="/product/category/?id=4">ACCESSORIES</a></li> <!-- Исправлено -->
        </ul>
    </div>
</div>

<?php if ($page === '/') : ?>
    <div class="header__bot">
        <div class="header__bot__content container">
            <div class="header__bot_img" aria-label="Fashion banner"></div>
            <div class="bot__content__heading">
                <div class="marker" aria-hidden="true"></div>
                <h1>
                    <span class="header__bolt">THE BRAND</span><br>
                    OF LUXURIOUS <span class="header__excretion">FASHION</span>
                </h1>
            </div>
        </div>
    </div>
<?php endif; ?>


<script>
    (function() {
        // ============================================
        // УПРАВЛЕНИЕ МЕНЮ (существующий код)
        // ============================================
        const menuButton = document.getElementById('menuButton');
        const menuPanel = document.getElementById('menuPanel');
        const closeMenuButton = document.getElementById('closeMenuButton');

        function updateAriaState(isOpen) {
            if (menuButton) {
                menuButton.setAttribute('aria-expanded', isOpen);
            }
            if (menuPanel) {
                menuPanel.setAttribute('aria-hidden', !isOpen);
            }
        }

        function toggleMenu(forceState) {
            if (!menuPanel) return;
            const isOpen = forceState !== undefined ? forceState : !menuPanel.classList.contains('active');
            if (isOpen) {
                menuPanel.classList.add('active');
            } else {
                menuPanel.classList.remove('active');
            }
            updateAriaState(isOpen);
        }

        if (menuButton && menuPanel) {
            menuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleMenu();
            });
        }

        if (closeMenuButton && menuPanel) {
            closeMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleMenu(false);
            });
        }

        if (menuButton && menuPanel) {
            document.addEventListener('click', function(e) {
                if (!menuPanel.contains(e.target) && e.target !== menuButton) {
                    toggleMenu(false);
                }
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuPanel && menuPanel.classList.contains('active')) {
                toggleMenu(false);
                if (menuButton) menuButton.focus();
            }
        });

        // ============================================
        // АВТОРИЗАЦИЯ (НОВЫЙ КОД)
        // ============================================

        class AuthModal {
            constructor() {
                this.modal = document.getElementById('authModal');
                this.trigger = document.getElementById('authModalTrigger');
                this.closeButton = document.getElementById('closeAuthModal');
                this.overlay = document.querySelector('.auth-modal__overlay');
                this.tabs = document.querySelectorAll('.auth-tab');
                this.loginForm = document.getElementById('loginForm');
                this.registerForm = document.getElementById('registerForm');
                this.isOpen = false;

                this.init();
            }

            init() {
                // Открытие модального окна по клику на иконку аккаунта
                if (this.trigger) {
                    this.trigger.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        this.open();
                    });
                }

                // Закрытие по кнопке Close
                if (this.closeButton) {
                    this.closeButton.addEventListener('click', () => this.close());
                }

                // Закрытие по клику на оверлей
                if (this.overlay) {
                    this.overlay.addEventListener('click', () => this.close());
                }

                // Переключение табов
                this.tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        const tabName = tab.getAttribute('data-tab');
                        this.switchTab(tabName);
                    });
                });

                // Обработка форм
                if (this.loginForm) {
                    this.loginForm.addEventListener('submit', (e) => this.handleLogin(e));
                }

                if (this.registerForm) {
                    this.registerForm.addEventListener('submit', (e) => this.handleRegister(e));
                }

                // Закрытие по ESC
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.isOpen) {
                        this.close();
                    }
                });

                // Социальные кнопки
                const socialBtns = document.querySelectorAll('.social-btn');
                socialBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const provider = btn.getAttribute('data-social');
                        this.handleSocialLogin(provider);
                    });
                });
            }

            open() {
                if (this.modal) {
                    this.modal.classList.add('active');
                    this.modal.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                    this.isOpen = true;

                    // Фокус на первое поле ввода
                    setTimeout(() => {
                        const firstInput = this.modal.querySelector('input');
                        if (firstInput) firstInput.focus();
                    }, 100);
                }
            }

            close() {
                if (this.modal) {
                    this.modal.classList.remove('active');
                    this.modal.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                    this.isOpen = false;
                    this.clearErrors();
                    this.resetForms();
                }
            }

            switchTab(tabName) {
                // Обновляем активный таб
                this.tabs.forEach(tab => {
                    if (tab.getAttribute('data-tab') === tabName) {
                        tab.classList.add('active');
                    } else {
                        tab.classList.remove('active');
                    }
                });

                // Показываем соответствующую форму
                if (tabName === 'login') {
                    this.loginForm.classList.add('active');
                    this.registerForm.classList.remove('active');
                } else {
                    this.loginForm.classList.remove('active');
                    this.registerForm.classList.add('active');
                }

                this.clearErrors();
            }

            clearErrors() {
                const errors = document.querySelectorAll('.error-message');
                errors.forEach(error => error.classList.remove('visible'));

                const inputs = document.querySelectorAll('.form-group input');
                inputs.forEach(input => input.classList.remove('error'));
            }

            resetForms() {
                if (this.loginForm) this.loginForm.reset();
                if (this.registerForm) this.registerForm.reset();
            }

            validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            showError(input, errorElement, message) {
                input.classList.add('error');
                errorElement.textContent = message;
                errorElement.classList.add('visible');
            }

            showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;
                notification.textContent = message;
                notification.style.cssText = `
                    position: fixed;
                    bottom: 20px;
                    right: 20px;
                    padding: 12px 24px;
                    background: ${type === 'success' ? '#2ecc71' : '#f16d7f'};
                    color: white;
                    border-radius: 8px;
                    z-index: 10000;
                    font-size: 14px;
                    animation: slideInUp 0.3s ease;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                `;

                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateY(20px)';
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            }

            async handleLogin(e) {
                e.preventDefault();

                const email = document.getElementById('loginEmail');
                const password = document.getElementById('loginPassword');
                let isValid = true;

                // Валидация
                if (!this.validateEmail(email.value)) {
                    this.showError(email, document.getElementById('loginEmailError'), 'Please enter a valid email address');
                    isValid = false;
                }

                if (password.value.length < 6) {
                    this.showError(password, document.getElementById('loginPasswordError'), 'Password must be at least 6 characters');
                    isValid = false;
                }

                if (!isValid) return;

                const submitBtn = this.loginForm.querySelector('.auth-submit-btn');
                const originalText = submitBtn.textContent;
                submitBtn.disabled = true;
                submitBtn.textContent = 'Signing in...';

                try {
                    // Здесь ваш AJAX запрос к серверу
                    // Пример:
                    const response = await fetch('/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            email: email.value,
                            password: password.value
                        })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        this.close();
                        this.showNotification('Welcome back!', 'success');
                        setTimeout(() => window.location.reload(), 1500);
                    } else {
                        this.showError(email, document.getElementById('loginEmailError'), data.message || 'Invalid email or password');
                    }
                } catch (error) {
                    console.error('Login error:', error);
                    this.showError(email, document.getElementById('loginEmailError'), 'Connection error. Please try again.');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            }

            async handleRegister(e) {
                e.preventDefault();

                const name = document.getElementById('registerName');
                const email = document.getElementById('registerEmail');
                const password = document.getElementById('registerPassword');
                const confirmPassword = document.getElementById('registerConfirmPassword');
                let isValid = true;

                if (name.value.trim().length < 2) {
                    this.showError(name, document.getElementById('registerNameError'), 'Please enter your full name');
                    isValid = false;
                }

                if (!this.validateEmail(email.value)) {
                    this.showError(email, document.getElementById('registerEmailError'), 'Please enter a valid email address');
                    isValid = false;
                }

                if (password.value.length < 6) {
                    this.showError(password, document.getElementById('registerPasswordError'), 'Password must be at least 6 characters');
                    isValid = false;
                }

                if (password.value !== confirmPassword.value) {
                    this.showError(confirmPassword, document.getElementById('registerConfirmError'), 'Passwords do not match');
                    isValid = false;
                }

                if (!isValid) return;

                const submitBtn = this.registerForm.querySelector('.auth-submit-btn');
                const originalText = submitBtn.textContent;
                submitBtn.disabled = true;
                submitBtn.textContent = 'Creating account...';

                try {
                    const response = await fetch('/api/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            name: name.value.trim(),
                            email: email.value,
                            password: password.value
                        })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        this.switchTab('login');
                        this.showNotification('Account created successfully! Please sign in.', 'success');
                        this.registerForm.reset();
                    } else {
                        this.showError(email, document.getElementById('registerEmailError'), data.message || 'Registration failed');
                    }
                } catch (error) {
                    console.error('Registration error:', error);
                    this.showError(email, document.getElementById('registerEmailError'), 'Connection error. Please try again.');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            }

            handleSocialLogin(provider) {
                this.showNotification(`Redirecting to ${provider}...`, 'info');
                setTimeout(() => {
                    window.location.href = `/auth/${provider}`;
                }, 500);
            }
        }

        // Инициализация после загрузки страницы
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new AuthModal();
            });
        } else {
            new AuthModal();
        }
    })();
</script>