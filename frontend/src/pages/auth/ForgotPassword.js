import { Component } from "react"

class ForgotPassword extends Component{

    componentDidMount(){
        document.title = 'Forgot Password | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default ForgotPassword