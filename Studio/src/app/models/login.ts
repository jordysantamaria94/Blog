export class Login {
    email: string;
    password: string;
    remember_me: boolean;

    constructor(email: string, password: string, remember_me: boolean) {
        this.email = email;
        this.password = password;
        this.remember_me = remember_me;
    }
}