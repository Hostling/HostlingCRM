import React, {useState, useEffect} from 'react';
import axios from 'axios';

const Edit = ({domen, show, close}) => {
    const [name, setName] = useState('');
    const [domenDate, setDomenDate] = useState('');
    const [hostDate, setHostDate] = useState('');
    const [comment, setComment] = useState('');
    const [domenPrice, setDomenPrice] = useState('');
    const [hostPrice, setHostPrice] = useState('');

    const handleNameChange = (e) => setName(e.target.value);
    const handleDomenDateChange = (e) => setDomenDate(e.target.value);
    const handleHostDateChange = (e) => setHostDate(e.target.value);
    const handleCommentChange = (e) => setComment(e.target.value);
    const handleDomenPriceChange = (e) => setDomenPrice(e.target.value);
    const handleHostPriceChange = (e) => setHostPrice(e.target.value);

    useEffect(() => {
        setName(domen.name);
        setComment(domen.comment);
        setDomenDate(domen.domenDate);
        setDomenPrice(domen.domenPrice);
        setHostDate(domen.hostDate);
        setHostPrice(domen.hostPrice);
    }, [show])

    const handleSave = (e) => {
        e.preventDefault();
        axios.post('/api/editTable',{
            id: domen.id,
            name,
            domenDate,
            domenPrice,
            hostDate,
            hostPrice,
            comment
        }, {headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }})
            .then(response => close());
    }

    const handleClose = (e) => {
        e.preventDefault();
        close();
    }

    return (
        <div className="modal" style={{display: show}}>
            <form className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <label htmlFor={name}>
                        Адрес
                        <input
                            type="text"
                            className="form-control"
                            onChange={handleNameChange}
                            value={name}
                        />
                    </label>
                    <label htmlFor={domenDate}>
                        Домен проплачен до
                        <input
                            type="date"
                            className="form-control"
                            onChange={handleDomenDateChange}
                            value={domenDate}
                        />
                    </label>
                    <label htmlFor={hostDate}>
                        Хостинг проплачен до
                        <input
                            type="date"
                            className="form-control"
                            onChange={handleHostDateChange}
                            value={hostDate}
                        />
                    </label>
                    <label htmlFor={comment}>
                        Комментарий
                        <input
                            type="text"
                            className="form-control"
                            onChange={handleCommentChange}
                            value={comment}
                        />
                    </label>
                    <label htmlFor={domenPrice}>
                        Цена домена
                        <input
                            type="text"
                            className="form-control"
                            onChange={handleDomenPriceChange}
                            value={domenPrice}
                        />
                    </label>
                    <label htmlFor={hostPrice}>
                        Цена хостинга
                        <input
                            type="text"
                            className="form-control"
                            onChange={handleHostPriceChange}
                            value={hostPrice}
                        />
                    </label>
                    <button className="btn btn-dark" onClick={handleSave}>Сохранить</button>
                    <button className="btn btn-dark" onClick={handleClose}>Отменить</button>
                </div>
            </form>
        </div>
    );
};

export default Edit;
