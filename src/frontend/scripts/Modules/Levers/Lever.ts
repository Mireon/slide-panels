import LeverClickListener from '@modules/Levers/LeverClickListener';
import Target from '@entities/Target';
import {C} from '@entities/C';
import Extractor from '@tools/Extractor';

/**
 * ...
 */
class Lever {
    /**
     * ...
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * ...
     *
     * @type C.action
     */
    private readonly action: C.action;

    /**
     * ...
     *
     * @type Target
     */
    private readonly target: Target;

    /**
     * The constructor.
     *
     * @param element { Element }
     */
    public constructor(element: Element) {
        this.element = element;
        this.action = Extractor.action(element, C.action.SHOW);
        this.target = Extractor.target(element, this.action);
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toShow(): boolean {
        if (this.action !== C.action.SHOW && this.action !== C.action.BACK) {
            return false;
        }

        return this.target !== null && this.target.isValid();
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toHide(): boolean {
        return this.action === C.action.HIDE;
    }

    /**
     * ...
     *
     * @type Target
     */
    public getTarget(): Target {
        return this.target;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public setClickListener(listener: LeverClickListener): void {
        this.element.addEventListener('click', (e) => {
            e.preventDefault();
            listener(this);
        });
    }
}

export default Lever;
