import { Component } from "react"
import { ShimmerCircularImage, ShimmerSectionHeader, ShimmerText, ShimmerThumbnail  } from "react-shimmer-effects"
import { withRouter } from '../../helpers/with-router';
import moment from 'moment'
import { NavLink } from "react-router-dom";
import ArticleService from "../../services/article";
import PageService from "../../services/page";

class Detail extends Component{

    constructor() {
        super();
        this.state = { 
            auth: localStorage.getItem("token") !== null,
            loading: true,
            ontent: {}
        }
    }

    componentWillMount(){
        document.title = 'Article Details | ' + process.env.REACT_APP_TITLE
        this.pingConnection()
    }

    async loadContent(){
        let slug = this.props.router.params.slug
        await ArticleService.detail(slug).then((response) => {
            setTimeout(() => { 
                this.setState({
                    content: response.data,
                    loading: false
                })
            }, 1500)
        }).catch((error) => {
            console.log(error)
        })
    }

    async pingConnection(){
        await PageService.ping().then(() => {
            setTimeout(() => { 
                this.loadContent()
            }, 1500)
        }).catch((error) => {
            console.log(error)
            this.props.router.navigate("/unavailable")
        })
    }

    render(){
        return (
            <>
                 <section className="py-5">
                    <div className="container px-5 my-5">
                        <div className="row gx-5">
                            <div className="col-lg-3">
                                { this.state.loading ? <>
                                    <ShimmerCircularImage center size={150} />
                                    <ShimmerSectionHeader center />
                                </> : <>
                                    <div className="d-flex align-items-center mt-lg-5 mb-4">
                                        <img className="img-fluid rounded-circle" width={50} src={this.state.content.gender === 'M' ? '/male.png' : '/female.png'} alt="..." />
                                        <div className="ms-3">
                                            <div className="fw-bold">{this.state.content.article.user.firstName} {this.state.content.article.user.lastName}</div>
                                            <div  className="text-muted">{this.state.content.article.user.aboutMe}</div>
                                        </div>
                                    </div>
                                </> }
                            </div>
                            <div className="col-lg-9">
                               
                                <article>
                                   
                                    <header className="mb-4">
                                        
                                        { this.state.loading ? <>
                                            <ShimmerText line={5} gap={10} />
                                        </> : <>
                                            <h1 className="fw-bolder mb-1">{this.state.content.article.title}</h1>
                                            <div className="text-muted fst-italic mb-2">{ moment(this.state.content.article.createdAt.timestamp,'X').fromNow()}</div>

                                            {this.state.content.article.references.map((category, index)=>{
                                                return (
                                                    <a key={index} className="badge bg-secondary text-decoration-none link-light" href="#!">{category.name}</a>
                                                )
                                            })}

                                        </> }

                                    </header>
                                   
                                    <figure className="mb-4">
                                        { this.state.loading ? <>
                                            <ShimmerThumbnail height={400}  rounded />
                                        </> : <>
                                            <img className="img-fluid rounded" src={"https://picsum.photos/id/"+(Math.floor(Math.random() * 100) + 0)+"/900/400"} alt="..." />
                                        </> }
                                    </figure>
                                   
                                    { this.state.loading ? <>
                                        
                                        <ShimmerText line={20} gap={10} />

                                    </> : <>
                                    
                                        <section className="mb-5">
                                            {this.state.content.article.content}
                                        </section>
                                    
                                    </> }

                                </article>
                              
                                <section>
                                    
                                    { this.state.loading ? <>
                                        <ShimmerThumbnail height={150}  rounded />
                                    </> : <>
                                    
                                        <div className="card bg-light">
                                            <div className="card-body">

                                                { this.state.auth ? <>
                                                    <form className="mb-4"><textarea className="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                                </> : <></> }
                                            
                                                
                                            
                                                <div className="d-flex mb-4">
                                                
                                                    <div className="flex-shrink-0"><img className="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div className="ms-3">
                                                        <div className="fw-bold">Commenter Name</div>
                                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                                    
                                                        <div className="d-flex mt-4">
                                                            <div className="flex-shrink-0"><img className="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                            <div className="ms-3">
                                                                <div className="fw-bold">Commenter Name</div>
                                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                            </div>
                                                        </div>
                                                    
                                                        <div className="d-flex mt-4">
                                                            <div className="flex-shrink-0"><img className="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                            <div className="ms-3">
                                                                <div className="fw-bold">Commenter Name</div>
                                                                When you put money directly to a problem, it makes a good headline.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div className="d-flex">
                                                    <div className="flex-shrink-0"><img className="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div className="ms-3">
                                                        <div className="fw-bold">Commenter Name</div>
                                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </> }

                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </>
        )
    }

}

export default withRouter(Detail)