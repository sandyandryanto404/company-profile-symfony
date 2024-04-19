import { Component } from "react"

class Profile extends Component{

    componentDidMount(){
        document.title = 'Manage Profile | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Profile