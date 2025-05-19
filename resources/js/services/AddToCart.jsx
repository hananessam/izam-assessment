const AddToCart = async (productId, quantity) => {
    const token = localStorage.getItem('token');

    const response = await fetch('/api/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`,
        },
        body: JSON.stringify({
            id: productId,
            quantity: quantity,
        }),
    });

    return {
        data: await response.json(),
        status: response.status,
        message: response.statusText,
    };
};

export default AddToCart;
