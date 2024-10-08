<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $status
 * @property int $show_at_home
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MenuItem> $menuItems
 * @property-read int|null $menu_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereShowAtHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $item_image
 * @property string $name
 * @property string $slug
 * @property int $category_id
 * @property string $description
 * @property float $price
 * @property float $offer_price
 * @property int $show_at_home
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MenuOption> $menuOptions
 * @property-read int|null $menu_options_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MenuSize> $menuSizes
 * @property-read int|null $menu_sizes_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereItemImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereOfferPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereShowAtHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereUpdatedAt($value)
 */
	class MenuItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $menu_item_id
 * @property string $name
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MenuItem $menuItem
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption whereMenuItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuOption whereUpdatedAt($value)
 */
	class MenuOption extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $menu_item_id
 * @property string $name
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MenuItem $menuItem
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize whereMenuItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuSize whereUpdatedAt($value)
 */
	class MenuSize extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $invoice_id
 * @property float $discount
 * @property float $subtotal
 * @property float $grand_total
 * @property int $product_qty
 * @property string|null $payment_method
 * @property string $payment_status
 * @property string|null $payment_approve_date
 * @property string|null $transaction_id
 * @property string|null $coupon_info
 * @property string|null $currency_name
 * @property string $order_status
 * @property int $earned_stamps
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $voucher_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Voucher|null $voucher
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEarnedStamps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentApproveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereVoucherId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $order_id
 * @property string $menu_item_name
 * @property int $menu_item_id
 * @property float $unit_price
 * @property int $qty
 * @property string $status
 * @property string|null $menu_item_size
 * @property string|null $menu_item_option
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MenuItem|null $menuItem
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereMenuItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereMenuItemName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereMenuItemOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereMenuItemSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $points
 * @property float $purchase_amount
 * @property int $bonus_points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Point newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Point newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Point query()
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereBonusPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point wherePurchaseAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Point whereUpdatedAt($value)
 */
	class Point extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $points
 * @property float $purchase_amount
 * @property int $bonus_points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserPointPurchase> $userPointPurchases
 * @property-read int|null $user_point_purchases_count
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase whereBonusPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase wherePurchaseAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointPurchase whereUpdatedAt($value)
 */
	class PointPurchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Proceed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proceed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proceed query()
 */
	class Proceed extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $phone
 * @property string|null $avatar
 * @property string|null $gender
 * @property int|null $age
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $stamp_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp whereStampCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stamp whereUserId($value)
 */
	class Stamp extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserPointPurchase> $pointPurchases
 * @property-read int|null $point_purchases_count
 * @property-read \App\Models\UserPoints|null $points
 * @property-read \App\Models\Profile|null $profile
 * @property-read \App\Models\Stamp|null $stamp
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Voucher> $vouchers
 * @property-read int|null $vouchers_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property float $point_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint wherePointBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoint whereUserId($value)
 */
	class UserPoint extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $point_purchase_id
 * @property float $amount_paid
 * @property int $points_received
 * @property string|null $payment_method
 * @property string|null $payment_status
 * @property string|null $payment_approve_date
 * @property string|null $transaction_id
 * @property string|null $currency_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PointPurchase $pointPurchase
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase wherePaymentApproveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase wherePointPurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase wherePointsReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPointPurchase whereUserId($value)
 */
	class UserPointPurchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property float $point_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints wherePointBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPoints whereUserId($value)
 */
	class UserPoints extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property float $discount_value
 * @property string|null $expiry_date
 * @property int $is_selected
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDiscountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereIsSelected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 */
	class Voucher extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property int $voucher_id
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherUser whereVoucherId($value)
 */
	class VoucherUser extends \Eloquent {}
}

