import {
    Grid,
    Card,
    CardMedia,
    CardContent,
    Typography,
    CardActions,
    Button,
    Box,
} from "@mui/material";
import GetProducts from "../services/GetProducts";
import { useState, useEffect } from "react";
import { useAuth } from "../hooks/AuthProvider";
import AddToCart from "../services/AddToCart";
import { useCart } from "../hooks/CartProvider";

const ProductsGrid = () => {
    const [products, setProducts] = useState([]);
    const auth = useAuth();
    const { setCart, setCartCount, setCartTotal } = useCart();

    const fetchProducts = async () => {
        try {
            const response = await GetProducts()
                .then((response) => {
                    if (response.status === 401) {
                        auth.logout();
                    }

                    setProducts(response.data.data);
                    return;
                })
                .catch((error) => {
                    throw new Error(error.message);
                });

        } catch (error) {
            console.error("Error fetching products:", error);
        }
    };

    useEffect(() => {
        fetchProducts();
    }, []);

    const handleAddToCart = async (productId, quantity) => {
        try {
            const response = await AddToCart(productId, quantity)
                .then((response) => {
                    if (response.status === 401) {
                        auth.logout();
                    }

                    return response;
                })
                .catch((error) => {
                    throw new Error(error.message);
                });

            if (response.status === 200) {
                console.log(response);
                setCart(response.data.cart);
                setCartCount(response.data.count);
                setCartTotal(response.data.total);
                alert("Product added to cart");
            } else {
                alert("Error adding product to cart");
            }
        } catch (error) {
            console.error("Error adding product to cart:", error);
        }
    }
    return (
        <>
        <Box sx={{ mb: 4 }}>
            <Typography variant="h5" gutterBottom>
                Products
            </Typography>
        </Box>
        <Grid container spacing={3}>
            {products && products.map((product) => (
                <Grid item size={{ xs:12, sm:6, md:4, lg:4 }} key={product.id}>
                    <Card>
                        <CardMedia
                            component="img"
                            height={200}
                            width={300}
                            sx={{ objectFit: "contain" }}
                            image={product.media?.[0]?.original_url}
                            alt={product.name}
                        />
                        <CardContent>
                            <Typography variant="p" component="h4" gutterBottom>
                                {product.name}
                            </Typography>
                            <Typography color="text.secondary">{product.price}</Typography>
                        </CardContent>
                        <CardActions>
                            <Button size="small" color="secondary" onClick={() => handleAddToCart(product.id, 1)}>
                                Add to Cart
                            </Button>
                        </CardActions>
                    </Card>
                </Grid>
            ))}
        </Grid>
    </>
    );
};

export default ProductsGrid;
