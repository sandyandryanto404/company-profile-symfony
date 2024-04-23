import { Component } from "react"
import { NavLink  } from "react-router-dom"
import { ShimmerThumbnail } from "react-shimmer-effects"
import { Tooltip } from 'react-tooltip'

class ForgotPassword extends Component{

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
                document.title = 'Forgot Password | ' + process.env.REACT_APP_TITLE
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
                                            <i className="bi bi-lock me-1"></i> Forgot Password
                                        </h4>
                                    </div>
                                    <div className="card-body">
                                        <h1 className="text-center mb-2 auth-icon text-primary"><i className="bi bi-person-circle"></i></h1>
                                        <form action="" method="POST" autoComplete="off">
                                            <p className="card-text fw-bold text-muted text-center mb-4">
                                                <small>Please complete the form below.</small>
                                            </p>
                                            <p className="text-center">
                                                <small>Enter your email address and we'll send you an email that will allow you reset
                                                    password.</small>
                                            </p>
                                            <div className="input-group mb-3">
                                                <input type="email" className="form-control" placeholder="Email Address" />
                                                <span className="input-group-text" id="basic-addon1">
                                                    <i className="bi bi-envelope"></i>
                                                </span>
                                            </div>
                                            <button type="submit"  className="btn btn-primary w-100">
                                               <i class="bi bi-send me-1"></i> Send Link
                                               <Tooltip anchorSelect=".btn-primary" content="Send link reset password now." />
                                            </button>
                                            <div className="mt-3 text-center">
                                                <NavLink to="/auth/login" className={"text-decoration-none login-link"}>
                                                    <i class="bi bi-arrow-left me-1"></i>Remember your password ? <strong>Log In</strong>
                                                </NavLink>
                                                <Tooltip anchorSelect=".login-link" content="Users enter their email and password in the designated fields to access their accounts" />
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

export default ForgotPassword