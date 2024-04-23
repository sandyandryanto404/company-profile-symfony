import { Component } from "react"
import { NavLink  } from "react-router-dom"
import { ShimmerThumbnail } from "react-shimmer-effects"
import { Tooltip } from 'react-tooltip'

class Login extends Component{

    constructor() {
        super();
        this.state = { 
            loading: true,
            auth: localStorage.getItem("token") !== null
        }
    }

    componentDidMount(){
        if(this.state.auth){
            setTimeout(() => {
                window.location.href = "/"
            }, 3000)
        }else{
            setTimeout(() => {
                document.title = 'Sign In | ' + process.env.REACT_APP_TITLE
                this.setState({ loading: false })
            }, 3000)
        }
    }

    render(){
        return (
            <>
                 <div className="container py-5">
                    <div className="row h-100 justify-content-center align-items-center mt-5">
                        { this.state.loading ? <>
                            <div className="col-md-4">
                                <ShimmerThumbnail height={400} rounded />
                            </div>
                        </> : <>
                            <div className="col-md-4">
                                <div className="card">
                                    <div className="card-header text-center bg-primary text-white">
                                        <h4 className="p-2">
                                            <i className="bi bi-lock me-1"></i> Sign In
                                        </h4>
                                    </div>
                                    <div className="card-body">
                                        <h1 className="text-center mb-2 auth-icon text-primary"><i className="bi bi-person-circle"></i></h1>
                                        <form action="" method="POST" autoComplete="off">
                                            <p className="card-text fw-bold text-muted text-center mb-4">
                                                <small>Please complete the form below.</small>
                                            </p>
                                            <div className="input-group mb-3">
                                                <input type="email" className="form-control" placeholder="Email Address" />
                                                <span className="input-group-text" id="basic-addon1">
                                                    <i className="bi bi-envelope"></i>
                                                </span>
                                            </div>
                                            <div className="input-group mb-3">
                                                <input type="password" className="form-control" placeholder="Password" />
                                                <span className="input-group-text" id="basic-addon1">
                                                    <i className="bi bi-key"></i>
                                                </span>
                                            </div>
                                            <div className="clearfix">
                                                <div className="float-start">
                                                    <div className="mb-3 form-check">
                                                        <input type="checkbox" name="remember" id="remember" className="form-check-input" />
                                                        <label className="form-check-label" htmlFor="exampleCheck1">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div className="float-end">
                                                    <NavLink to="/auth/email/forgot" className={"text-decoration-none forgot-password-link"}>
                                                        <i className="bi bi-key me-2" ></i>Forgot password ?
                                                    </NavLink>
                                                    <Tooltip anchorSelect=".forgot-password-link" content="Forgot Password service that allows the user to request a password reset." />
                                                </div>
                                            </div>
                                            <button type="submit"  className="btn btn-primary w-100">
                                                <i className="bi bi-arrow-right me-1"></i> Sign In
                                                <Tooltip anchorSelect=".btn-primary" content="Users enter their email and password in the designated fields to access their accounts" />
                                            </button>
                                            <div className="mt-3 text-center">
                                                <NavLink to="/auth/register" className={"text-decoration-none register-link"}>
                                                    <i className="bi bi-pencil-square me-1"></i>Don't have an account ? <strong>Register Here</strong>
                                                </NavLink>
                                                <Tooltip anchorSelect=".register-link" content="The process of registering for a new user account on a website." />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </> }
                    </div>
                 </div>
            </>
        )
    }

}

export default Login