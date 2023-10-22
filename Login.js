const formOpenBtn = document.querySelector("#form-open");
        const home = document.querySelector(".home");
        const formContainer = document.querySelector(".formbox");
        const formCloseBtn = document.querySelector(".form_close");
        const signupBtn = document.querySelector("#signup");
        const loginButton = document.querySelector("#login");

        formOpenBtn.addEventListener("click", () => {
            home.classList.add("show");
            formContainer.style.opacity = 1;
            formContainer.style.pointerEvents = 'auto';
        });

        formCloseBtn.addEventListener("click", () => {
            home.classList.remove("show");
            formContainer.style.opacity = 0;
            formContainer.style.pointerEvents = 'none';
        });

        signupBtn.addEventListener("click", () => {
            // Handle sign-up logic here
        });
