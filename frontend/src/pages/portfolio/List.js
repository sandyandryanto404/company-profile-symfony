import { Component } from "react"

class List extends Component{

    componentDidMount(){
        document.title = 'Portfolio | ' + process.env.REACT_APP_TITLE
    }

    render(){
        return (<></>)
    }

}

export default List