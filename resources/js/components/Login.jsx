import React, {useState} from 'react';

const Login = ({auth, handleSubmit, errorMessage, handleChangeMail, handleChangePass, mail, pwd}) => {
    return (
        <main className="container">
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="mail">
                            E-mail
                            <input
                                className="form-control"
                                type="mail"
                                placeholder="example@domain.xyz"
                                name="mail"
                                value={mail}
                                onChange={handleChangeMail}
                                required
                            />
                        </label>
                    </div>
                    <div className="form-group">
                        <label htmlFor="pwd">
                            Пароль
                            <input
                                className="form-control"
                                type="password"
                                placeholder=""
                                name="pwd"
                                value={pwd}
                                onChange={handleChangePass}
                                required
                            />
                        </label>
                    </div>
                        <input
                          value="Авторизоваться"
                          type="submit"
                          className="btn btn-lg btn-primary"
                          onClick={handleSubmit}
                            />
                    </form>
        </main>
    );
};

export default Login;
