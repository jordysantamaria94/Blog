import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  email: string;
  password: string;

  constructor(private blogService: BlogService, private router: Router) { }

  ngOnInit(): void {
  }

  ingresar() {
    console.log(this.email, this.password);

    const data = {
      email: this.email,
      password: this.password,
      remember_me: true
    }

    this.blogService.login(data)
      .subscribe(response => {
        
        localStorage.setItem('id', response['id']);
        localStorage.setItem('name', response['name']);
        localStorage.setItem('token', response['access_token']);

        this.router.navigate(['/admin/posts/list']);

      }, (error => {
        console.log(error);
      }));
  }

}
