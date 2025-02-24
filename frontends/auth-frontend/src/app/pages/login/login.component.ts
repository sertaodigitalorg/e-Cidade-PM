import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../services/auth.service';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss',
})
export class LoginComponent {
    loginForm: FormGroup;
    errorMessage: string;

    constructor(
      private authService: AuthService, 
      private router: Router,
      private fb: FormBuilder) {

        this.errorMessage = '';

        this.loginForm = this.fb.group({
          login: ['', Validators.required],
          senha: ['', Validators.required]
        });

      }

    onLogin(): void {

      if (this.loginForm.valid) {
        const { login, senha } = this.loginForm.value;      
        this.authService.login(login, senha).subscribe({
          next: (response) => {
            this.authService.saveToken(response.token); // Salva o token JWT no localStorage
            this.router.navigate(['/profile']); // Redirecionar para o perfil do usuário
          },
          error: () => {
            this.errorMessage = 'Credenciais inválidas. Tente novamente.';
          }
        });

      } else {
        
        this.errorMessage = 'Por favor, preencha todos os campos.';
      }

    }
}
