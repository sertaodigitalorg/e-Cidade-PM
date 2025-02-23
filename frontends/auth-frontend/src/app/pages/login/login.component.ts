import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../services/auth.service';
import { Router } from '@angular/router';
import { FormControl, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss',
})
export class LoginComponent {
    errorMessage = '';

    constructor(private authService: AuthService, private router: Router) {}

    loginForm = new FormGroup({
      login: new FormControl(''),
      senha: new FormControl('')
    });

    onLogin(): void {
      debugger;
      const { login, senha } = this.loginForm.value;
      console.log("Login "+login);
      console.log("Senha "+senha);
      /*this.authService.login(this.login, this.senha).subscribe({
        next: (response) => {
          this.authService.saveToken(response.token); // Salva o token JWT no localStorage
          this.router.navigate(['/profile']); // Redirecionar para o perfil do usuário
        },
        error: () => {
          this.errorMessage = 'Credenciais inválidas. Tente novamente.';
        }
      });*/
    }
}
