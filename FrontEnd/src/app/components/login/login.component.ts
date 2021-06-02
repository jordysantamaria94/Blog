import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { Login } from 'src/app/models/login';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  btnLoginDisabled: boolean = false;
  btnLoginText: string = "Ingresar";

  constructor(private blogService: BlogService, private router: Router) { }

  ngOnInit(): void {
    this.verifyLogin();
  }

  verifyLogin(): void {

    try {

      if (localStorage.getItem("token") !== null) {
        this.blogService.verifyToken()
          .subscribe(response => {
            console.log(response);
            this.router.navigate(['/admin/posts/list']);
          });
      }

    } catch (error) {
      console.log(error);
    }

  }

  ingresar(sendForm: NgForm): void {

    const loginForm = new Login(sendForm.value.email, sendForm.value.password, true);

    try {

      if (loginForm.email !== "" && loginForm.password !== "") {

        this.customButtonLogin(true, "Cargando...");
        
        this.blogService.login(loginForm)
          .subscribe(response => {
            
            localStorage.setItem('id', response['id']);
            localStorage.setItem('name', response['name']);
            localStorage.setItem('token', response['access_token']);

            this.router.navigate(['/admin/posts/list']);

        }, (error => {
          console.log(error);
          this.customButtonLogin(false, "Ingresar");
        }));
        
      }

    } catch (error) {
      console.log(error);
      this.customButtonLogin(false, "Ingresar");
    }
  }

  customButtonLogin(disabled: boolean, text: string): void {
    this.btnLoginDisabled = disabled;
    this.btnLoginText = text;
  }

}
