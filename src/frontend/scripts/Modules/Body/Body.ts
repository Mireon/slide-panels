import BodyAnimation from '@modules/Body/BodyAnimation';
import Selector from '@tools/Selector';

/**
 * The body.
 */
export default class Body {
    /**
     * The body animation.
     *
     * @type BodyAnimation
     */
    private readonly animation: BodyAnimation;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new BodyAnimation(Selector.body());
    }

    /**
     * Freezes the body.
     *
     * @return void
     */
    public freeze(): void
    {
        this.animation.freeze();
    }

    /**
     * Unfreezes the body.
     *
     * @return void
     */
    public unfreeze(): void
    {
        this.animation.unfreeze();
    }
}
