import { Component } from "react"
import { ShimmerThumbnail } from "react-shimmer-effects"
import { Tooltip } from 'react-tooltip'

class ResetPassword extends Component{

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
                document.title = 'Reset Password | ' + process.env.REACT_APP_TITLE
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
                                            <i className="bi bi-lock me-1"></i> Reset Password
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
                                                <input type="password" className="form-control" placeholder="New Password" />
                                                <span className="input-group-text" id="basic-addon1">
                                                    <i className="bi bi-key"></i>
                                                </span>
                                            </div>
                                            <div className="input-group mb-3">
                                                <input type="password" className="form-control" placeholder="Confirm Password" />
                                                <span className="input-group-text" id="basic-addon1">
                                                    <i className="bi bi-key"></i>
                                                </span>
                                            </div>
                                            <button type="submit"  className="btn btn-primary w-100">
                                                <i className="bi bi-save me-1"></i> Set Password
                                                <Tooltip anchorSelect=".btn-primary" content="Update New Password" />
                                            </button>
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

export default ResetPassword