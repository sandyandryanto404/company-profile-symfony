import { Component } from "react"

class Detail extends Component{

    componentDidMount(){
        document.title = 'Portfolio Details | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default Detail