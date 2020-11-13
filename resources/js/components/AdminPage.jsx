import React, {useState, useEffect } from 'react';
import Edit from "./Edit";
import Add from "./Add";
import axios from 'axios';

const AdminPage = () => {
    const [table, setTable] = useState([]);
    const [showEdit, setShowEdit] = useState('none');
    const [editProps, setEditProps] = useState({
        id: '',
        name: '',
        domenDate: '',
        domenPrice: '',
        comment: '',
        hostDate: '',
        hostPrice: '',
    });
    const [showAdd, setShowAdd] = useState('none');

    useEffect(() => {
        getInfo();
    }, []);

    const getInfo = () => {
        axios.get('/api/getTable', {headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }})
            .then(response => setTable(response.data))
    }

    const handleShowEdit = (domen) => {
        setEditProps(domen);
        setShowEdit('block');
    }

    const closeEdit = () => {
        setShowEdit('none');
        getInfo();
    }

    const handleShowAdd = () => {
        setShowAdd('block');
    }

    const closeAdd = () => {
        setShowAdd('none');
        getInfo();
    }

    const handleDelete = (id) => {
        axios.delete('/api/delete/' + id, {headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }})
            .then(() => getInfo());
    }

    return (
        <div>
            <Edit show={showEdit} domen={editProps} close={closeEdit} />
            <Add show={showAdd} close={closeAdd} />
            <button className="btn btn-dark" onClick={handleShowAdd}>Добавить домен</button>
            <table className="table table-striped">
                <thead>
                <tr>
                    <th>Адрес</th>
                    <th>Домен проплачен до..</th>
                    <th>Хостинг проплачен до..</th>
                    <th>Комментарий</th>
                    <th>Цена домена</th>
                    <th>Цена хостинга</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                {table.map(item => (
                    <tr key={item.id}>
                        <td>{item.name}</td>
                        <td>{item.domenDate}</td>
                        <td>{item.hostDate}</td>
                        <td>{item.comment}</td>
                        <td>{item.domenPrice}</td>
                        <td>{item.hostPrice}</td>
                        <td><button className="btn btn-dark" onClick={handleShowEdit.bind(this, item)}>Редактировать</button></td>
                        <td><button className="btn btn-dark" onClick={handleDelete.bind(this, item.id)}>Удалить</button></td>
                    </tr>
                ))}
                </tbody>
            </table>
            <button className="btn btn-dark" onClick={handleShowAdd}>Добавить домен</button>
        </div>
    );
};

export default AdminPage;
