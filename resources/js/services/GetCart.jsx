const GetCart = async () => {
    const token = localStorage.getItem('token');

    const response = await fetch('/api/cart', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
        },
    });

    return {
        cart: await response.json(),
        status: response.status,
        message: response.statusText,
    };
};

export default GetCart;
