import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { BlogService } from 'src/app/services/blog.service';

@Component({
  selector: 'app-list-group-admin',
  templateUrl: './list-group-admin.component.html',
  styleUrls: ['./list-group-admin.component.css']
})
export class ListGroupAdminComponent implements OnInit {

  constructor(private route: Router, private blogService: BlogService) { }

  ngOnInit(): void {
  }

  logout(): void {

    this.blogService.logout()
      .subscribe(response => {
        console.log(response);
        localStorage.clear();
        this.route.navigate(["/"]);
      });
  }

}
