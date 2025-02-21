import { Route, RouterModule } from '@angular/router';
import { ForgotPasswordComponent } from './pages/forgot-password/forgot-password.component';
import { SignUpComponent } from './pages/sign-up/sign-up.component';
import { NgModule } from '@angular/core';
import { LoginComponent } from './pages/login/login.component';

export const appRoutes: Route[] = [
    { path: '', component: LoginComponent },
    { path: 'esqueci-senha', component: ForgotPasswordComponent },
    { path: 'criar-conta', component: SignUpComponent }
  ];

  @NgModule({
    imports: [RouterModule.forRoot(appRoutes)],
    exports: [RouterModule]
  })
  export class AppRoutes {}