import LeverClickListener from '@modules/Levers/LeverClickListener';
import Target from '@tools/Target';
import { Props } from '@tools/Props';
import Extractor from '@tools/Extractor';

/**
 * The lever.
 */
export default class Lever {
    /**
     * The DOM element.
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * The lever action.
     *
     * @type Props.action
     */
    private readonly action: Props.action;

    /**
     * The target.
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
        this.action = Extractor.action(element, Props.action.SHOW);
        this.target = Extractor.target(element);
    }

    /**
     * Indicates that the lever is for show.
     *
     * @type boolean
     */
    public toShow(): boolean {
        if (this.action !== Props.action.SHOW) {
            return false;
        }

        return this.target !== null && this.target.isValid();
    }

    /**
     * Indicates that the lever is for hide.
     *
     * @type boolean
     */
    public toHide(): boolean {
        return this.action === Props.action.HIDE;
    }

    /**
     * Returns the target.
     *
     * @type Target
     */
    public getTarget(): Target {
        return this.target;
    }

    /**
     * Sets a listener on click to lever.
     *
     * @type boolean
     */
    public setClickListener(listener: LeverClickListener): void {
        this.element.addEventListener('click', e => {
            e.preventDefault();
            listener(this);
        });
    }
}
