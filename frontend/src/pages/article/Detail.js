import { Component } from "react"

class Detail extends Component{

    componentDidMount(){
        document.title = 'Article Details | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Detail