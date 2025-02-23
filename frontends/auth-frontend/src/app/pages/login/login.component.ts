import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss',
})
export class LoginComponent {
    login = '';
    senha = '';
    errorMessage = '';

    constructor(private authService: AuthService, private router: Router) {}

    onLogin(): void {
      this.authService.login(this.login, this.senha).subscribe({
        next: (response) => {
          this.authService.saveToken(response.token); // Salva o token JWT no localStorage
          this.router.navigate(['/profile']); // Redirecionar para o perfil do usuário
        },
        error: () => {
          this.errorMessage = 'Credenciais inválidas. Tente novamente.';
        }
      });
    }
}
