import { Component } from "react"

class ResetPassword extends Component{

    componentDidMount(){
        document.title = 'Reset Password | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default ResetPassword