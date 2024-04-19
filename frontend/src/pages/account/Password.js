import { Component } from "react"

class Password extends Component{

    componentDidMount(){
        document.title = 'Change Password | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Password