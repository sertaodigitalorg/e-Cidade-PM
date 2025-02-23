import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/env';
import { User } from '../models/user.model';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = environment.apiUrl; // Pegando do arquivo de config

  constructor(private http: HttpClient) {}

  login(login: string, senha: string): Observable<{ token: string}> {
    return this.http.post<{ token: string}>(`${this.apiUrl}/login`, { login, senha });
  }

  getUser(): Observable<User> {
    return this.http.get<User>(`${this.apiUrl}/user`);
  }

  logout(): void {
    localStorage.removeItem('token');
  }

  isAuthenticated(): boolean {
    return !!localStorage.getItem('token');
  }
}
