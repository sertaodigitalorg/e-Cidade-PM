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
          localStorage.setItem('token', response.token); // Salvar token JWT
          this.router.navigate(['/profile']); // Redirecionar para a página protegida
        },
        error: () => {
          this.errorMessage = 'Credenciais inválidas. Tente novamente.';
        }
      });
    }
}
