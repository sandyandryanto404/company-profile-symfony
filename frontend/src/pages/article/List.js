import { Component } from "react"
import { ShimmerThumbnail, ShimmerText, ShimmerPostItem  } from "react-shimmer-effects"

class List extends Component{

    constructor() {
        super();
        this.state = { 
            loading: true
        }
    }

    componentDidMount(){
        document.title = 'Article | ' + process.env.REACT_APP_TITLE
        setTimeout(() => {
            this.setState({ loading: false })
        }, 3000)
    }

    render(){
        return (
            <>
                <section className="py-5">
                    <div className="container px-5">
                        <h1 className="fw-bolder fs-5 mb-4">Company Blog</h1>
                        <div className="card border-0 shadow rounded-3 overflow-hidden">
                            <div className="card-body p-0">
                                <div className="row gx-0">
                                    <div className="col-lg-6 col-xl-5 py-lg-5">
                                        { this.state.loading ? <>
                                            <ShimmerText line={10} gap={10} className="p-4 p-md-5" />
                                        </> : <>
                                            <div className="p-4 p-md-5">
                                                <div className="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                                <div className="h2 fw-bolder">Article heading goes here</div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique delectus ab doloremque, qui doloribus ea officiis...</p>
                                                <a className="stretched-link text-decoration-none" href="#!">
                                                    Read more
                                                    <i className="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </> }
                                    </div>
                                    <div className="col-lg-6 col-xl-7">
                                        { this.state.loading ? <>
                                            <ShimmerThumbnail height={350} className="bg-featured-blog" />
                                        </> : <>
                                            <div className="bg-featured-blog" style={{backgroundImage: `url("https://dummyimage.com/700x350/343a40/6c757d")` }}></div>
                                        </> }
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section className="py-5 bg-light">
                    <div className="container px-5">
                        <div className="row gx-5">
                            <div className="col-xl-8">
                                <h2 className="fw-bolder fs-5 mb-4">News</h2>
                                
                                { this.state.loading ? <>

                                    <div className="mb-4">
                                        <ShimmerText line={5} gap={10}  />
                                    </div>
                                
                                    <div className="mb-5">
                                        <ShimmerText line={5} gap={10} />
                                    </div>
                                
                                    <div className="mb-5">
                                       <ShimmerText line={5} gap={10} />
                                    </div>
                           
                                
                                </> : <>
                                
                                    <div className="mb-4">
                                        <div className="small text-muted">May 12, 2023</div>
                                        <a className="link-dark" href="#!"><h3>Start Bootstrap releases Bootstrap 5 updates for templates and themes</h3></a>
                                    </div>
                                
                                    <div className="mb-5">
                                        <div className="small text-muted">May 5, 2023</div>
                                        <a className="link-dark" href="#!"><h3>Bootstrap 5 has officially landed</h3></a>
                                    </div>
                                
                                    <div className="mb-5">
                                        <div className="small text-muted">Apr 21, 2023</div>
                                        <a className="link-dark" href="#!"><h3>This is another news article headline, but this one is a little bit longer</h3></a>
                                    </div>
                                    <div className="text-end mb-5 mb-xl-0">
                                        <a className="text-decoration-none" href="#!">
                                            More news
                                            <i className="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                
                                </> }


                            </div>
                            <div className="col-xl-4">
                                
                                { this.state.loading ? <>
                                    <ShimmerThumbnail height={400} rounded />
                                </> : <>
                                
                                <div className="card border-0 h-100">
                                    <div className="card-body p-4">
                                        <div className="d-flex h-100 align-items-center justify-content-center">
                                            <div className="text-center">
                                                <div className="h6 fw-bolder">Contact</div>
                                                <p className="text-muted mb-4">
                                                    For press inquiries, email us at
                                                    <br />
                                                    <a href="#!">press@domain.com</a>
                                                </p>
                                                <div className="h6 fw-bolder">Follow us</div>
                                                <a className="fs-5 px-2 link-dark" href="#!"><i className="bi-twitter"></i></a>
                                                <a className="fs-5 px-2 link-dark" href="#!"><i className="bi-facebook"></i></a>
                                                <a className="fs-5 px-2 link-dark" href="#!"><i className="bi-linkedin"></i></a>
                                                <a className="fs-5 px-2 link-dark" href="#!"><i className="bi-youtube"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                </> }

                            </div>
                        </div>
                    </div>
                </section>
                
                <section className="py-5">
                    <div className="container px-5">
                        <h2 className="fw-bolder fs-5 mb-4">Featured Stories</h2>
                        <div className="row gx-5">
                            { this.state.loading ? <>

                               <div className="col-lg-4 mb-5">
                                    <ShimmerPostItem card title text cta />
                               </div>

                               <div className="col-lg-4 mb-5">
                                    <ShimmerPostItem card title text cta />
                               </div>

                               <div className="col-lg-4 mb-5">
                                    <ShimmerPostItem card title text cta />
                               </div>
                            
                            </> : <>
                            
                                <div className="col-lg-4 mb-5">
                                    <div className="card h-100 shadow border-0">
                                        <img className="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                                        <div className="card-body p-4">
                                            <div className="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                            <a className="text-decoration-none link-dark stretched-link" href="#!"><div className="h5 card-title mb-3">Blog post title</div></a>
                                            <p className="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div className="card-footer p-4 pt-0 bg-transparent border-top-0">
                                            <div className="d-flex align-items-end justify-content-between">
                                                <div className="d-flex align-items-center">
                                                    <img className="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                    <div className="small">
                                                        <div className="fw-bold">Kelly Rowan</div>
                                                        <div className="text-muted">March 12, 2023 &middot; 6 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-4 mb-5">
                                    <div className="card h-100 shadow border-0">
                                        <img className="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                                        <div className="card-body p-4">
                                            <div className="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                                            <a className="text-decoration-none link-dark stretched-link" href="#!"><div className="h5 card-title mb-3">Another blog post title</div></a>
                                            <p className="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div className="card-footer p-4 pt-0 bg-transparent border-top-0">
                                            <div className="d-flex align-items-end justify-content-between">
                                                <div className="d-flex align-items-center">
                                                    <img className="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                    <div className="small">
                                                        <div className="fw-bold">Josiah Barclay</div>
                                                        <div className="text-muted">March 23, 2023 &middot; 4 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-4 mb-5">
                                    <div className="card h-100 shadow border-0">
                                        <img className="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                                        <div className="card-body p-4">
                                            <div className="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                            <a className="text-decoration-none link-dark stretched-link" href="#!"><div className="h5 card-title mb-3">The last blog post title is a little bit longer than the others</div></a>
                                            <p className="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <div className="card-footer p-4 pt-0 bg-transparent border-top-0">
                                            <div className="d-flex align-items-end justify-content-between">
                                                <div className="d-flex align-items-center">
                                                    <img className="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                                    <div className="small">
                                                        <div className="fw-bold">Evelyn Martinez</div>
                                                        <div className="text-muted">April 2, 2023 &middot; 10 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </> }
                        </div>
                        <div className="text-end mb-5 mb-xl-0">
                            <a className="text-decoration-none" href="#!">
                                More stories
                                <i className="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </section>
            </>
        )
    }

}

export default List