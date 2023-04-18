//Ali code


class Header {
    constructor(tag, className, text) {
      this.element = document.createElement(tag);
      this.element.className = className;
      this.element.textContent = text;
    }
  
    render(target) {
      target.appendChild(this.element);
    }
  }
  
  const header = new Header('h1', 'text-center p-3', 'LOGIN');
  header.render(document.body);
  

class LoginForm {
    constructor() {
      this.formContainer = document.createElement('div');
      this.formContainer.classList.add('d-flex', 'justify-content-center', 'align-items-center');
  
      this.form = document.createElement('form');
      this.form.classList.add('shadow', 'p-3', 'rounded');
      this.form.action = "php/check_login.php";
      this.form.method = "post";
  
      this.title = document.createElement('h1');
      this.title.classList.add('text-center', 'p-3');
      this.title.textContent = 'LOGIN';
  
      this.alertBox = document.createElement('div');
      this.alertBox.classList.add('alert', 'alert-danger');
      this.form.appendChild(this.alertBox);
  
      this.usernameContainer = document.createElement('div');
      this.usernameContainer.classList.add('mb-3');
  
      this.usernameLabel = document.createElement('label');
      this.usernameLabel.setAttribute('for', 'username');
      this.usernameLabel.classList.add('form-label');
      this.usernameLabel.textContent = 'Gebruikersnaam';
  
      this.usernameInput = document.createElement('input');
      this.usernameInput.setAttribute('type', 'text');
      this.usernameInput.setAttribute('name', 'username');
      this.usernameInput.setAttribute('id', 'username');
      this.usernameInput.classList.add('form-control');
  
      this.usernameContainer.appendChild(this.usernameLabel);
      this.usernameContainer.appendChild(this.usernameInput);
      this.form.appendChild(this.usernameContainer);
  
      this.passwordContainer = document.createElement('div');
      this.passwordContainer.classList.add('mb-3');
  
      this.passwordLabel = document.createElement('label');
      this.passwordLabel.setAttribute('for', 'password');
      this.passwordLabel.classList.add('form-label');
      this.passwordLabel.textContent = 'Wachtwoord';
  
      this.passwordInput = document.createElement('input');
      this.passwordInput.setAttribute('type', 'password');
      this.passwordInput.setAttribute('name', 'password');
      this.passwordInput.setAttribute('id', 'password');
      this.passwordInput.classList.add('form-control');
  
      this.passwordContainer.appendChild(this.passwordLabel);
      this.passwordContainer.appendChild(this.passwordInput);
      this.form.appendChild(this.passwordContainer);
  
      this.selectContainer = document.createElement('div');
      this.selectContainer.classList.add('mb-1');
  
      this.selectLabel = document.createElement('label');
      this.selectLabel.classList.add('form-label');
      this.selectLabel.textContent = 'Selecteer gebruiker type:';
  
      this.select = document.createElement('select');
      this.select.classList.add('form-select', 'mb-3');
      this.select.setAttribute('name', 'role');
      this.select.setAttribute('aria-label', 'Default select example');
  
      const options = ['User', 'Admin', 'Manager', 'Moderator', 'Updater'];
      options.forEach(option => {
        const selectOption = document.createElement('option');
        selectOption.setAttribute('value', option.toLowerCase());
        selectOption.textContent = option;
        if (option === 'User') selectOption.setAttribute('selected', '');
        this.select.appendChild(selectOption);
      });
  
      this.selectContainer.appendChild(this.selectLabel);
      this.selectContainer.appendChild(this.select);
      this.form.appendChild(this.selectContainer);
  
      this.submitBtn = document.createElement('button');
      this.submitBtn.setAttribute('type', 'submit');
      this.submitBtn.classList.add('btn', 'btn-primary');
      this.submitBtn.textContent = 'LOGIN';
      this.form.appendChild(this.submitBtn);
  
      this.formContainer.appendChild(this.form);
    }
  
    render() {
      document.body.appendChild(this.formContainer);
    }
  }
  
  const loginForm = new LoginForm();
  loginForm.render();