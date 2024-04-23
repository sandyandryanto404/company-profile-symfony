import { Component } from "react"
import { ShimmerThumbnail } from "react-shimmer-effects"
import { Tooltip } from 'react-tooltip'
import country from 'country-list-js'

class Profile extends Component{

    constructor() {
        super();
        this.state = { 
            loading: true,
            auth: localStorage.getItem("token") !== null,
            countries: [],
            imgPreview:"https://dummyimage.com/150x150/343a40/6c757d",
            fields: {
                gender:"",
                country:""
            }
        }
        this.onChangeGender = this.onChangeGender.bind(this)
        this.onChangeCountry = this.onChangeCountry.bind(this)
    }

    componentDidMount(){
        if(!this.state.auth){
            window.location.href = "/"
        }else{
            setTimeout(() => {
                document.title = 'Manage Profile | ' + process.env.REACT_APP_TITLE
                let countries = country.names().sort()
                this.setState({ loading: false, countries: countries })
            }, 3000)
        }
    }

    onChangeGender(e){
        let fields = this.state.fields;
        fields.gender = e.target.value;
        this.setState({
            fields: fields
        })
      }

    onChangeCountry(e){
        let fields = this.state.fields;
        fields.country = e.target.value;
        this.setState({
            fields: fields
        })
      }

    render(){
        return (
            <>
                 <div className="container py-5">
                    <div className="row h-100 justify-content-center align-items-center mt-5">
                        { this.state.loading ? <>
                            <div className="col-md-7">
                                <ShimmerThumbnail height={400} rounded />
                            </div>
                        </> : <>
                            <div className="col-md-7">
                                <div className="card">
                                    <div className="card-header bg-primary text-white">
                                        <h4 className="p-2  text-center">
                                            <i className="bi bi-person me-1"></i> Manage Profile
                                        </h4>
                                    </div>
                                    <div className="card-body">
                                        <form action="" method="POST" autoComplete="off">
                                                <div className="row mt-4 mb-2 justify-content-center align-items-center">
                                                    <div className="col-md-6">
                                                        <div className="text-center">
                                                            <h5>
                                                                <small>Profile Picture</small>
                                                            </h5>
                                                            <img className="img-fluid rounded-3" src={this.state.imgPreview} alt="..." />
                                                        </div>
                                                        <div className="mb-3 mt-3">
                                                            <input type="file" className="form-control" id="" placeholder="" name="file_image"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="row">
                                                    <div className="col-md-6">
                                                        <div className="mb-3 mt-3">
                                                            <label htmlFor="email" className="form-label">Email:</label>
                                                            <input type="email" className="form-control" id="" placeholder="" name=""/>
                                                        </div>
                                                        <div className="mb-3 mt-3">
                                                            <label htmlFor="first_name" className="form-label">First Name:</label>
                                                            <input type="text" className="form-control" id="" placeholder="" name=""/>
                                                        </div>
                                                        <div className="mb-3 mt-3">
                                                            <label htmlFor="gender" className="form-label">Gender:</label>
                                                            <select name="gender"  className="form-control" options={[]} onChange={(e) => this.onChangeGender(e)} value={this.state.fields.gender}>
                                                                <option disabled value="">Choose Gender</option>
                                                                <option value="M">Male</option>
                                                                <option value="F">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div className="col-md-6">
                                                    <div className="mb-3 mt-3">
                                                        <label htmlFor="phone" className="form-label">Phone Number:</label>
                                                        <input type="text" className="form-control" id="" placeholder="" name=""/>
                                                    </div>
                                                    <div className="mb-3 mt-3">
                                                        <label htmlFor="last_name" className="form-label">Last Name:</label>
                                                        <input type="text" className="form-control" id="" placeholder="" name=""/>
                                                    </div>
                                                    <div className="mb-3 mt-3">
                                                        <label htmlFor="country" className="form-label">Country:</label>
                                                        <select name="country"  className="form-control" options={[]} onChange={(e) => this.onChangeCountry(e)} value={this.state.fields.country}>
                                                            <option disabled value="">Choose Country</option>
                                                            {this.state.countries.map((item,index)=>{
                                                                return (
                                                                    <option key={index} value={item}>{ item }</option>
                                                                )
                                                            })}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="mb-3">
                                                <label htmlFor="address" className="form-label">Address:</label>
                                                <textarea rows="4" className="form-control"></textarea>
                                            </div>
                                            <div className="mb-3">
                                                <label htmlFor="about" className="form-label">About Me:</label>
                                                <textarea rows="4" className="form-control"></textarea>
                                            </div>
                                            <button type="submit" className="btn btn-success" >
                                                <i className="bi bi-save me-1"></i> Save Changed
                                            </button>
                                            <button type="reset" className="ms-1 text-white btn btn-warning">
                                                <i className="bi bi-arrow-clockwise me-1"></i> Reset Form
                                            </button>
                                            <Tooltip anchorSelect=".btn-success" content="Update Profile" />
                                            <Tooltip anchorSelect=".btn-warning" content="Reset Form" />
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

export default Profile