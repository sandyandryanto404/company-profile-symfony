/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto404@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

import service from './service'

class AccountService {

    profileDetail(){
        return service().get("api/account/profile")
    }

    profileUpdate(data){
        return service().post("api/account/profile", data)
    }

    passwordUpdate(data){
        return service().post("api/account/password", data)
    }

    upload(data){
        return service().get("api/account/upload", data)
    }

}

// eslint-disable-next-line import/no-anonymous-default-export
export default new AccountService();