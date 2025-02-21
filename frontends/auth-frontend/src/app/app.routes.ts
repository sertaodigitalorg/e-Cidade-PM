import { Route, RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { ForgotPasswordComponent } from './pages/forgot-password/forgot-password.component';
import { SignUpComponent } from './pages/sign-up/sign-up.component';
import { NgModule } from '@angular/core';

export const appRoutes: Route[] = [
    { path: '', component: AppComponent },
    { path: 'esqueci-senha', component: ForgotPasswordComponent },
    { path: 'cadastrar', component: SignUpComponent }
  ];

  @NgModule({
    imports: [RouterModule.forRoot(appRoutes)],
    exports: [RouterModule]
  })
  export class AppRoutes {}